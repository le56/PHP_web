<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;

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
        return view('pages.Blog.Blog-list',["blogs" => $this->paginate($req,6)]);
    }

    public function showBlogGrid(Request $req) {
        return view('pages.Blog.Blog-grid',["blogs" => $this->paginate($req,6)]);
    }
   
    public function showBlogDetail($id) {
       return view('pages.Blog.blog');
    }
  
    public function getOnePost($id) {
        $post = post::where('id', $id)->first();
        return $post;
    }

    public function paginate($req,$number) {
        $blog = new Blog;
        $queries = [];
        if($req->has('search')) {
            $blog = $blog->where('title','like','%'.$req->search.'%');
            $queries['search'] = $req->search;
        }
        $blog = $blog->paginate($number)->appends($queries);
        return $blog;
    }

    // admin
    public function createPost(Request $request) {
      
    }
    public function updatePost(Request $request) {

    }
    public function deletePost($id) {
      $post = post::where('id', $id)->delete();
      return $post;
    }
    public function findPost($search) {
       $posts = post::where('title',"like", "%".$search."%")->where('content',"like", "%".$search."%")->get();
       return $posts;
    }
}
