<?php

namespace App\Http\Controllers;

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
    public function showBlog() {
        return view('pages.Blog.Blog-grid');
    }
   
    public function showBlogDetail($id) {
       return view('pages.Blog.blog');
    }
  
    public function getOnePost($id) {
        $post = post::where('id', $id)->first();
        return $post;
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
