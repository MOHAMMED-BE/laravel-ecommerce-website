<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
    public function ShowBlog()
    {
        $blogpost = BlogPost::latest()->get();
        $blogcategory = BlogPostCategory::latest()->get();

        return view('frontend.blog.blog-view',compact('blogpost','blogcategory'));
    } // end ShowBlog

    public function BlogDetails($post_id)
    {
        $post = BlogPost::findOrFail($post_id);
        $blogcategory = BlogPostCategory::latest()->get();

        return view('frontend.blog.blog-details',compact('post','blogcategory'));
    } // end BlogDetails

    public function HomeBlogCategoryPost($id)
    {
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::where('category_id',$id)->get();

        return view('frontend.blog.blog-view',compact('blogpost','blogcategory'));
    } // end HomeBlogCategoryPost
}
