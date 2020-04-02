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
        return view('admin.category.index', compact('categories'));
    }

    // Insert Category
    public function StoreCategory(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required| max:100| min:3'
        ], [
            'category_name.required' => 'ও সখীগো, তোমার CATগরী ডা কই ??',
            'category_name.min' => 'কম লেখলে ট্যাহা দিমু না'
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
}
