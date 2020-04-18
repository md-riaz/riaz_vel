<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductMultiplePhoto;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
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
        return view('admin.product.index', [
            'products' => Product::all(),
            'products_trash' => Product::onlyTrashed()->get(),
            'categories' => Category::all()
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
        // Create new product
        $product = Product::create(request()->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'product_price' => 'required',
            'product_thumbnail_photo' => 'required | image',
            'product_quantity' => 'required',
            'product_short_description' => 'required',
            'product_long_description' => 'required',
        ]));
        // Get the id and rename the img
        $id = $product->id;
        $uploaded_img = request()->file('product_thumbnail_photo'); // Get the file from user
        $img_name = $id . '.' . $uploaded_img->getClientOriginalExtension(); // rename image to id+file extension
        $img_url = base_path('public/uploads/product_photos/' . $img_name); // image url with path to store
        Image::make($uploaded_img)->resize(600, 622)->save($img_url); // save the new image with new name
        // Update img field with new name
        Product::findOrFail($id)->update([
            'product_thumbnail_photo' => $img_name
        ]);
        /* Multiple photo upload start */
        // Set a counter
        $counter = 0;
        // Loop through each uploaded img as a variable and store in a folder
        foreach (\request()->file('product_photos') as $product_photo) {
            $uploaded_img = $product_photo; // Get the file from user
            $img_name = $id . "-" . $counter . '.' . $uploaded_img->getClientOriginalExtension(); // rename image to id+file extension
            $img_url = base_path('public/uploads/product_multiple_photos/' . $img_name); // image url with path to store
            Image::make($uploaded_img)->resize(600, 550)->save($img_url); // save the new image with new name
            // insert all photo name and product id to a new table
            ProductMultiplePhoto::create([
                'product_id' => $id,
                'photo_name' => $img_name
            ]);
            $counter++;
        }

        /* Multiple photo upload end */


        $notification = 'Product Added Successfully.';
        return back()->with('success_message', $notification);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update()
    {
        // store the id to a variable
        $id = request()->product_id;
        // If new photo is uploaded then unlink old photo from database and store new photo info
        if (request()->hasFile('product_thumbnail_photo')) {
            request()->validate([
                'product_thumbnail_photo' => 'image'
            ]);
            unlink(base_path('public/uploads/product_photos/' . Product::find($id)->product_thumbnail_photo));
            $uploaded_img = request()->file('product_thumbnail_photo'); // Get the file from user
            $img_name = $id . '.' . $uploaded_img->getClientOriginalExtension(); // rename image to id+file extension
            $img_url = base_path('public/uploads/product_photos/' . $img_name); // image url with path to store
            Image::make($uploaded_img)->resize(600, 622)->save($img_url); // save the new image with new name
            Product::findOrFail($id)->update([
                'product_thumbnail_photo' => $img_name
            ]);
        }
        // Or just update other information
        Product::findOrFail($id)->update([
            'product_price' => request()->product_price,
            'product_quantity' => request()->product_quantity,
            'product_short_description' => request()->product_short_description,
            'product_long_description' => request()->product_long_description
        ]);

        return redirect('/add/products')->with('update_status', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('delete_status', 'Product sent to trash successfully');
    }

    public function restore($id)
    {
        Product::onlyTrashed()->findOrFail($id)->restore();
        return back()->with('restore_message', 'Product restored successfully');
    }

    public function harddestroy($id)
    {

        $multiPhoto = ProductMultiplePhoto::where('product_id', $id);
        if ($multiPhoto->exists()) {
            foreach ($multiPhoto->get() as $item) {
                unlink(base_path('public/uploads/product_multiple_photos/' . $item->photo_name));
                $item->delete();
            }
        }
        unlink(base_path('public/uploads/product_photos/' . Product::onlyTrashed()->find($id)->product_thumbnail_photo));
        Product::onlyTrashed()->findOrFail($id)->forceDelete();
        ProductMultiplePhoto::where('product_id', $id);
        return back()->with('fdelete', 'Product permanently deleted');
    }
}
