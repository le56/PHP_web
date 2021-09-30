<?php

namespace App\Http\Controllers;

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

    public function showBlog() {
        return view('pages.Blog.Blog-grid');
    }
    public function showBlogDetail($id) {
       return view('pages.Blog.blog');
    }
}
