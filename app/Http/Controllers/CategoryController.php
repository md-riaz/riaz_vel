<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function AddCategory()
    {
        $categories = Category::all();
        $categories_trash = Category::onlyTrashed()->get();
        return view('admin.category.index', compact('categories', 'categories_trash'));
        // return $categories_trash;
    }

    // Insert Category
    public function StoreCategory(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required| unique:categories,category_name| max:100| min:3',
            'category_image' => 'required| image' //The file under validation must be an image (jpeg, png, bmp, or gif)
        ], [
            'category_name.required' => 'ও সখীগো, তোমার CATগরী ডা কই ??',
            'category_name.min' => 'কম লেখলে ট্যাহা দিমু না',
            'category_name.unique' => 'সেম নাম দেস ক্যান হালা?'
        ]);

        // insert a record and retrieve the id
        $Category_id = Category::insertGetId([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now() // Current timestamp
        ]);

        $uploaded_img = $request->file('category_image'); // Get the file from user
        $img_name = $Category_id . '.' . $uploaded_img->getClientOriginalExtension(); // rename image to id+file extension
        $img_url = base_path('public/uploads/category_photos/' . $img_name); // image url with path to store
        Image::make($uploaded_img)->save($img_url); // save the new image with new name

        $notification = 'Category Added Successfuly.';
        return back()->with('success_message', $notification);
    }

    // Update Category
    public function UpdateCategory($id)
    {
        $category = Category::findOrfail($id);
        return view('admin.category.update', compact('category'));
    }
    public function UpdateCategoryPost(Request $request)
    {
        Category::findOrfail($request->category_id)->update([
            'category_name' => $request->category_name
        ]);
        return redirect('/add/category')->with('update_status', 'মামু CATগরী আপডেট হইয়া গিয়াচে.');
    }
    public function DestroyCategory($id)
    {
        Category::findOrfail($id)->delete();
        return back()->with('delete_status', 'মামু CATগরী আগুনে পুইরা গিয়াচে.');
    }
    public function RestoreCategory($id)
    {
        Category::withTrashed()->findOrfail($id)->restore();
        return back()->with('restore_message', 'Data Restored.');
    }
    public function HardDestroyCategory($id)
    {
        Category::withTrashed()->findOrfail($id)->forceDelete();
        return back()->with('Fdelete_message', 'Data Deleted Parmanently.');
    }
}
