<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
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
        return view('admin.banner.index', [
            'banners' => Banner::all(),
            'banner_trash' => Banner::onlyTrashed()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        request()->validate([
            'banner_title' => 'required',
            'banner_info' => 'required',
            'banner_photo' => 'required | image'
        ]);
        $banner = Banner::create([
            'user_id' => Auth::user()->id,
            'banner_title' => request()->banner_title,
            'banner_info' => request()->banner_info
        ]);

        $id = $banner->id;
        $uploaded_img = request()->file('banner_photo'); // Get the file from user
        $img_name = $id . '.' . $uploaded_img->getClientOriginalExtension(); // rename image to id+file extension
        $img_url = base_path('public/uploads/banner_photos/' . $img_name); // image url with path to store
        Image::make($uploaded_img)->resize(1920, 1000)->save($img_url); // save the new image with new name

        Banner::findOrFail($id)->update([
            'banner_photo' => $img_name
        ]);

        $notification = 'Banner Added Successfully.';
        return back()->with('success_message', $notification);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Banner $banner
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', [
            'banner' => $banner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Banner $banner
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update()
    {
        // store the id to a variable
        $id = request()->banner_id;
        // If new photo is uploaded then unlink old photo from database and store new photo info
        if (request()->hasFile('banner_photo')) {
            request()->validate([
                'banner_photo' => 'image'
            ]);
            unlink(base_path('public/uploads/banner_photos/' . Banner::findOrFail($id)->banner_photo));
            $uploaded_img = request()->file('banner_photo'); // Get the file from user
            $img_name = $id . '.' . $uploaded_img->getClientOriginalExtension(); // rename image to id+file extension
            $img_url = base_path('public/uploads/banner_photos/' . $img_name); // image url with path to store
            Image::make($uploaded_img)->resize(1920, 1000)->save($img_url); // save the new image with new name
            Banner::findOrFail($id)->update([
                'banner_photo' => $img_name
            ]);
        }
        // Or just update other information
        Banner::findOrFail($id)->update([
            'banner_title' => request()->banner_title,
            'banner_info' => request()->banner_info
        ]);

        return redirect('/add/banner')->with('update_status', 'Banner Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Banner $banner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return back()->with('delete_status', 'Banner deleted successfully');
    }

    public function hardDelete($banner)
    {
        unlink(base_path('public/uploads/banner_photos/' . Banner::withTrashed()->findOrFail($banner)->banner_photo));
        Banner::onlyTrashed()->findOrFail($banner)->forceDelete();
        return back()->with('Fdelete_banner', 'Banner forced deleted successfully');
    }

    public function restore($banner)
    {
        Banner::withTrashed()->findOrFail($banner)->restore();
        return back()->with('restore_message', 'Data Restored.');
    }
}
