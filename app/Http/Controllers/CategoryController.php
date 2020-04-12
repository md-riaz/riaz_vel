<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
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


    public function AddCategory()
    {
        $categories = Category::all();
        $categories_trash = Category::onlyTrashed()->get();
        return view('admin.category.index', compact('categories', 'categories_trash'));
        // return $categories_trash;
    }

    // Insert Category
    public function StoreCategory()
    {
        request()->validate([
            'category_name' => 'required| unique:categories,category_name| max:100| min:3',
            'category_image' => 'required| image' //The file under validation must be an image (jpeg, png, bmp, or gif)
        ], ['category_name.required' => 'Category Name is required', 'category_name.min' => 'কম লেখলে ট্যাহা দিমু না', 'category_name.unique' => 'সেম নাম দেস ক্যান হালা?']);

        // insert a record and retrieve the id
        $Category_id = Category::insertGetId([
            'category_name' => request()->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now() // Current timestamp
        ]);

        $uploaded_img = request()->file('category_image'); // Get the file from user
        $img_name = $Category_id . '.' . $uploaded_img->getClientOriginalExtension(); // rename image to id+file extension
        $img_url = base_path('public/uploads/category_photos/' . $img_name); // image url with path to store
        Image::make($uploaded_img)->resize(600, 470)->save($img_url); // save the new image with new name

        Category::findOrFail($Category_id)->update([
            'category_img' => $img_name
        ]);

        $notification = 'Category Added Successfully.';
        return back()->with('success_message', $notification);
    }

    // Update Category
    public function UpdateCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.update', compact('category'));
    }

    public function UpdateCategoryPost()
    {
        Category::findOrFail(request()->category_id)->update([
            'category_name' => request()->category_name
        ]);
        return redirect('/add/category')->with('update_status', 'Category Updated Successfully');
    }

    public function DestroyCategory($id)
    {
        Category::findOrFail($id)->delete();
        return back()->with('delete_status', 'Category Deleted');
    }

    public function RestoreCategory($id)
    {
        Category::withTrashed()->findOrFail($id)->restore();
        return back()->with('restore_message', 'Data Restored.');
    }

    public function HardDestroyCategory($id)
    {
        unlink(base_path('public/uploads/category_photos/' . Category::withTrashed()->findOrFail($id)->category_img));
        Category::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('Fdelete_message', 'Data Deleted Permanently.');
    }
}
