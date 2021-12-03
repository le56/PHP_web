<?php

namespace App\Http\Controllers;

use App\Http\common\common;
use App\Models\Blog;
use App\Models\category;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

    }


    /************* USER CAN HANDLE */
    public function showBlog(Request $req) {
        return view('pages.Blog.Blog-grid',[
        "blogs" => common::filterBlog($req,6),
        'products'=>products::orderBy('created_at', 'asc')->limit(3)->get(),
    ]);
    }

    public function showCreateBlogUser() {
        return view('pages.Blog.createBlog',["categories"=>category::all()]);
    }

    public function showBlogGrid(Request $req) {
        return view('pages.Blog.Blog-grid',["blogs" => common::filterBlog($req,6)]);
    }
   
    public function showBlogDetail($id) {
        $post = Blog::find($id);
        if(!$post) return redirect("/");
        if($post->display == 0) {
            if(Session::get("admin_id")) return view('pages.Blog.blog',["blog" => $post]);
            else return redirect("/");
        }
       return view('pages.Blog.blog',["blog" => $post]);
    }
   // 
    public function getOnePostUser($id) {
        $post = Blog::where("idUser",auth()->user()->id)->find($id);
        return $post;
    }
    
    public function getBlogByIDUser() {
        return view('pages.Blog.blogManagement',["blogs" => Blog::where("idUser",auth()->user()->id)->where("admin",0)->get(),"categories" => category::all()]);
    }

    public function deletePostUser($id) {
        $post = Blog::where("idUser",Auth()->user()->id)->find($id);
        if(!$post) return response()->json(["error"=>"Invalid post !"],404);    
        $path = public_path()."\images\\".$post->image;
        if(file_exists($path)) unlink($path);
        $post->delete();
        return "deleted";
    }

    public function addBlogUser(Request $request) {
        $check = $this->createPost($request,0,auth()->user()->id);
        if(!$check)
        return redirect()->back()->withErrors(["image" => "The blog avatar image is required !"]);
        return redirect()->back();
    }

    public function updateBlogUser(Request $request,$id) {
        $post = $this->updateBlog($request,$id,auth()->user()->id,false);
        if(!$post) return redirect()->back()->withErrors(["error" => "Invalid blog post !"]);
        return redirect()->back();
    }
    
    /************  ADMIN HANDLE */
    // show create blog page
    public function showCreateblog() {
        return view('Admin.blog.createBlog',["categories"=>category::all()]);
    }
    // create blog admin
    public function createBlogAmin(Request $request) {
        $check = $this->createPost($request,1,Session::get("admin_id"));
        if(!$check)
        return redirect()->back()->withErrors(["image" => "The blog avatar image is required !"]);
        return redirect()->back();
    }
    // show all list posts blog
    public function showAllListPostBlog() {
        return view('Admin.blog.listAllBlog',["blogs"=>Blog::all(),"categories"=>category::all()]);
    }
     // update post admin
     public function updatePostAdmin(Request $request,$id) {
        $post = $this->updateBlog($request,$id,false,true);
        if(!$post) return response()->json(["error"=>"Not find blog !"],404);
        return $post;
     }
    // delete post
    public function deletePost($id) {
      $blog = Blog::find($id);
      $path = public_path()."\images\\".$blog->image;
      if(file_exists($path)) unlink($path);
      $blog->delete();
      return $id;
    }
    // find post
    public function searchBlog(Request $request) {
     return common::filterBlog($request,20);
    }
    // get anyone post
    public function getOnePost($id) {
        $post = Blog::find($id);
        return $post;
    }
    // approved post
    public function approved(Request $request,$id) {
      $post = Blog::find($id);
      if(!$post) return response()->json(["error"=>"Invalid post !"]);
      $post->approved = 1;
      $post->display = $request->status;
      $post->save();
      return $id;
    }
    // show approved post
    public function showApproved() {
        return view('Admin.blog.approvedBlog',["blogs"=>Blog::where("approved",0)->get()]);
    }

    /********** COMMON */
     // create blog page
     public function createPost($request,$admin,$id) {
        if($request->hasFile("image")) {
          $image =  uploadImageController::upload_not_response($request->file("image"));
          Blog::create([
              "idUser" => $id,
              "title" => $request->input("title"),
              "shortContent" => $request->input("shortContent"),
              "content" => $request->input("content"),
              "category" => $request->input("category"),
              "image" => $image,
              "admin" => $admin,
              "display" => $admin ? 1 : 0,
              "approved" => $admin ? 1 : 0
          ]);
          return true;
        }
        return false;
      }

      // update post
      public function updateBlog($request,$id,$userID,$admin) {
        if($userID) $blog = Blog::where("idUser",$userID)->find($id);
        else  $blog = Blog::find($id);
        if(!$blog) return false;
        if($request->hasFile('image')) {
            $path = public_path()."\images\\".$blog->image;
            if(file_exists($path)) unlink($path);
            $image =  uploadImageController::upload_not_response($request->file("image"));
            $blog->image = $image;
        }
        $blog->title = $request->input("title");
        $blog->content = $request->input("content");
        $blog->shortContent = $request->input("shortContent");
        $blog->category = $request->input("category");
        if($userID) {
            $blog->display = 0;
            $blog->approved = 0;
        }
        if($admin) $blog->display = $request->input("display");
        $blog->save();
        return $blog;
     }
   
}
