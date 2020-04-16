<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.blog.index', [
            'categories' => Category::all(),
            'blogs' => Blog::all(),
            'blog_trash' => Blog::onlyTrashed()->get()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|Request|string
     */
    public function store()
    {

        $blog = Blog::create(request()->validate([
                'blog_title' => 'required',
                'blog_thumbnail_photo' => 'required | image',
                'blog_description' => 'required',
            ]) + [
                'user_id' => Auth::user()->id
            ]);

        $id = $blog->id;
        $uploaded_img = request()->file('blog_thumbnail_photo'); // Get the file from user
        $img_name = $id . '.' . $uploaded_img->getClientOriginalExtension(); // rename image to id+file extension
        $img_url = base_path('public/uploads/blog_photos/' . $img_name); // image url with path to store
        Image::make($uploaded_img)->resize(870, 500)->save($img_url); // save the new image with new name

        Blog::findOrFail($id)->update([
            'blog_thumbnail_photo' => $img_name
        ]);

        $notification = 'Blog Published Successfully.';
        return back()->with('success_message', $notification);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Blog $blog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', [
            'blog' => $blog,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Blog $blog
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update()
    {
        // store the id to a variable
        $id = request()->blog_id;
        // If new photo is uploaded then unlink old photo from database and store new photo info
        if (request()->hasFile('blog_thumbnail_photo')) {
            request()->validate([
                'blog_thumbnail_photo' => 'image'
            ]);
            unlink(base_path('public/uploads/blog_photos/' . Blog::find($id)->blog_thumbnail_photo));
            $uploaded_img = request()->file('blog_thumbnail_photo'); // Get the file from user
            $img_name = $id . '.' . $uploaded_img->getClientOriginalExtension(); // rename image to id+file extension
            $img_url = base_path('public/uploads/blog_photos/' . $img_name); // image url with path to store
            Image::make($uploaded_img)->resize(870, 500)->save($img_url); // save the new image with new name
            Blog::findOrFail($id)->update([
                'blog_thumbnail_photo' => $img_name
            ]);
        }
        // Or just update other information
        Blog::findOrFail($id)->update([
            'blog_title' => request()->blog_title,
            'blog_description' => request()->blog_description,
        ]);

        return redirect('/add/blogs')->with('update_status', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Blog $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back()->with('delete_status', 'Blog sent to trash successfully');
    }


    public function restore($id)
    {
        Blog::onlyTrashed()->findOrFail($id)->restore();
        return back()->with('restore_message', 'Blog restored successfully');
    }

    public function harddestroy($id)
    {
        Blog::onlyTrashed()->findOrFail($id)->forceDelete();
        return back()->with('fdelete', 'Blog permanently deleted');
    }

}
