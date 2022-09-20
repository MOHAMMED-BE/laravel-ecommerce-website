<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function BlogCategory()
    {
        $blogcategory = BlogPostCategory::latest()->get();

        return view('backend.blog.category.blog-category-view',compact('blogcategory'));
    } // end BlogCategory
}
