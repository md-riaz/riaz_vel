<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.testimonial.index', [
            'testimonials' => Testimonial::all()
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
        $testimonial = Testimonial::create(request()->validate([
            'name' => 'required',
            'designation' => 'required',
            'speech' => 'required',
            'client_photo' => 'required | image'
        ]));

        $id = $testimonial->id;
        $uploaded_img = request()->file('client_photo'); // Get the file from user
        $img_name = $id . '.' . $uploaded_img->getClientOriginalExtension(); // rename image to id+file extension
        $img_url = base_path('public/uploads/testimonial_photos/' . $img_name); // image url with path to store
        Image::make($uploaded_img)->resize(140, 110)->save($img_url); // save the new image with new name

        Testimonial::findOrFail($id)->update([
            'client_photo' => $img_name
        ]);

        $notification = 'Testimonial Added Successfully.';
        return back()->with('success_message', $notification);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Testimonial $testimonial
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', [
            'testimonial' => $testimonial
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Testimonial $testimonial
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update()
    {
        // store the id to a variable
        $id = request()->testimonial_id;
        // If new photo is uploaded then unlink old photo from database and store new photo info
        if (request()->hasFile('client_photo')) {
            request()->validate([
                'client_photo' => 'image'
            ]);
            unlink(base_path('public/uploads/testimonial_photos/' . Testimonial::findOrFail($id)->client_photo));
            $uploaded_img = request()->file('client_photo'); // Get the file from user
            $img_name = $id . '.' . $uploaded_img->getClientOriginalExtension(); // rename image to id+file extension
            $img_url = base_path('public/uploads/testimonial_photos/' . $img_name); // image url with path to store
            Image::make($uploaded_img)->resize(140, 110)->save($img_url); // save the new image with new name
            Testimonial::findOrFail($id)->update([
                'client_photo' => $img_name
            ]);
        }
        // Or just update other information
        Testimonial::findOrFail($id)->update([
            'name' => request()->name,
            'designation' => request()->designation,
            'speech' => request()->speech
        ]);

        return redirect('/add/testimonials')->with('update_status', 'Testimonial Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Testimonial $testimonial
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('delete_status', 'Testimonial Deleted Successfully');
    }
}
