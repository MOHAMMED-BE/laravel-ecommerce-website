<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
{
    public function BlogCategory()
    {
        $blogcategory = BlogPostCategory::latest()->get();

        return view('backend.blog.category.blogcategory-view',compact('blogcategory'));
    } // end BlogCategory

    function BlogCategoryStore(Request $request)
    {
        $request->validate(
            [
                'blog_category_name_en' => 'required',
                'blog_category_name_ar' => 'required',
            ],
            [
                'blog_category_name_en.required' => 'Input Category Name English',
                'blog_category_name_ar.required' => 'Input Category Name Arabic',
            ]
        );

        BlogPostCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_ar' => $request->blog_category_name_ar,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
            'blog_category_slug_ar' => str_replace(' ', '-', $request->blog_category_name_ar),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'BlogCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end BlogCategoryStore

    public function BlogCategoryEdit($id)
    {
        $blogcategory = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.blogcategory-edit', compact('blogcategory'));
    } // end BlogcategoryEdite

    function BlogCategoryUpdate(Request $request)
    {
        $blog_blog_category_id = $request->id;

        BlogPostCategory::findOrFail($blog_blog_category_id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_ar' => $request->blog_category_name_ar,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
            'blog_category_slug_ar' => str_replace(' ', '-', $request->blog_category_name_ar),
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'BlogCategory Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('blog.category')->with($notification);
    } // end BlogCategoryUpdate

    public function BlogCategoryDelete($id)
    {
        BlogPostCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'BlogCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end BlogCategoryDelete

    public function BlogPostList()
    {
        $blogpost = BlogPost::latest()->get();

        return view('backend..blog.post.post-list',compact('blogpost'));
    } // end BlogPostList

    public function AddBlogPost()
    {
        $blogcategory = BlogPostCategory::orderBy('blog_category_name_en','asc')->get();

        return view('backend.blog.post.post-add',compact('blogcategory'));
    } // end AddBlogPost


    // =======================================

    public function BlogPostStore(Request $request)
    {
        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/post-images/'.$name_gen);
        $save_url = 'upload/post-images/'.$name_gen;

        $post_id = BlogPost::insertGetId([
            'category_id' => $request->category_id,

            'post_title_en' => $request->post_title_en,
            'post_title_ar' => $request->post_title_ar,
            'post_slug_en' => strtolower(str_replace(' ', '-', $request->post_title_en)),
            'post_slug_ar' => str_replace(' ', '-', $request->post_title_ar),
            'post_details_en' => $request->post_details_en,
            'post_details_ar' => $request->post_details_ar,

            'post_image' => $save_url,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Post Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.post')->with($notification);
    } // end BlogPostStore

    public function BlogPostEdit($id)
    {
        $blogpost = BlogPost::findOrFail($id);
        $blogcategory = BlogPostCategory::orderBy('blog_category_name_en','asc')->get();

        return view('backend.blog.post.post-edit',compact('blogpost','blogcategory'));
    } // end BlogPostEdit

    public function BlogPostUpdate(Request $request)
    {
        $post_id = $request->id;

        BlogPost::findOrFail($post_id)->update([
            'category_id' => $request->category_id,

            'post_title_en' => $request->post_title_en,
            'post_title_ar' => $request->post_title_ar,
            'post_slug_en' => strtolower(str_replace(' ', '-', $request->post_title_en)),
            'post_slug_ar' => str_replace(' ', '-', $request->post_title_ar),
            'post_details_en' => $request->post_details_en,
            'post_details_ar' => $request->post_details_ar,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Post Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.post')->with($notification);
    } // end BlogPostUpdate


    public function BlogPostImageUpdate(Request $request)
    {
        $image = $request->post_image;
        $old_img = $request->old_img;
        unlink($old_img);

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/post-images/'.$name_gen);
        $save_url = 'upload/post-images/'.$name_gen;

        $post_id = $request->id;

        BlogPost::findOrFail($post_id)->update([
            'post_image' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Post Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.post')->with($notification);
    } // end BlogPostImageUpdate

    public function BlogPostDelete($id)
    {
        $post = BlogPost::findOrFail($id);
        unlink($post->post_image);
        BlogPost::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Post Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end BlogPostDelete




}
