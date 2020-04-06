<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'category_name' => 'required| unique:categories,category_name| max:100| min:3'
        ], [
            'category_name.required' => 'ও সখীগো, তোমার CATগরী ডা কই ??',
            'category_name.min' => 'কম লেখলে ট্যাহা দিমু না',
            'category_name.unique' => 'সেম নাম দেস ক্যান হালা?'
        ]);

        Category::insert($validatedData + [
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

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
