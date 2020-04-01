<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AddCategory()
    {
        return view('admin.category.index');
    }
    public function StoreCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required| max:100| min:3'
        ], [
            'category_name.required' => 'ও সখীগো, তোমার CATগরী ডা কই ??',
            'category_name.min' => 'কম লেখলে ট্যাহা দিমু না'
        ]);
        dd($request->category_name);
    }
}
