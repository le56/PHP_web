<?php

namespace App\Http\Controllers;

use App\Http\common\common;
use App\Models\Blog;
use App\Models\category;
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


    // client 
    public function showBlog(Request $req) {
        return view('pages.Blog.Blog-list',["blogs" => common::filterBlog($req,6)]);
    }

    public function showBlogGrid(Request $req) {
        return view('pages.Blog.Blog-grid',["blogs" => common::filterBlog($req,6)]);
    }
   
    public function showBlogDetail($id) {
       return view('pages.Blog.blog');
    }
  
    public function getOnePost($id) {
        $post = Blog::find($id);
        return $post;
    }

  

    // admin
    // show create blog page
    public function showCreateblog() {
        return view('Admin.blog.createBlog',["categories"=>category::all()]);
    }
    // create blog page
    public function createPost(Request $request) {
      if($request->hasFile("image")) {
        $image =  uploadImageController::upload_not_response($request->file("image"));
        Blog::create([
            "idUser" => Session::get("admin_id"),
            "title" => $request->input("title"),
            "shortContent" => $request->input("shortContent"),
            "content" => $request->input("content"),
            "category" => $request->input("category"),
            "image" => $image,
            "admin" => 1
        ]);
        return redirect()->back();
      }
      return redirect()->back()->withErrors(["image" => "The blog avatar image is required !"]);
    }
    // show all list posts blog
    public function showAllListPostBlog() {
        return view('Admin.blog.listAllBlog',["blogs"=>Blog::all(),"categories"=>category::all()]);
    }
    // update post
    public function updateBlog(Request $request,$id) {
       $blog = Blog::find($id);
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
       $blog->save();
       return $blog;
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
   
}
