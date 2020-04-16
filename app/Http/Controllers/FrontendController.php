<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Blog;
use App\Category;
use App\Faq;
use App\Message;
use App\Product;
use App\ProductMultiplePhoto;
use App\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('index', [
            'categories' => Category::all(),
            'banners' => Banner::all(),
            'products' => Product::all(),
            'testimonials' => Testimonial::all(),
        ]);
    }

    public function about()
    {
        return view('site.about');
    }

    public function product($id)
    {
        $category_id = Product::findOrFail($id)->category_id;
        return view('site.product', [
            'product' => Product::findOrFail($id),
            'product_photos' => ProductMultiplePhoto::where('product_id', $id)->get(),
            'related' => Product::where('category_id', $category_id)->where('id', '!=', $id)->limit(4)->get()
        ]);
    }

    public function contact()
    {
        return view('site.contact');
    }

    public function ContactStore()
    {
        // Validate data and store on database
        Message::create(request()->validate([
            'name' => 'required | min:3',
            'email' => 'required | email:rfc',
            'subject' => 'required',
            'message' => 'required'
        ]));

        return redirect('contact#cmsg')->with('msg', 'Congrats, We have received your message');
    }

    public function Faq()
    {
        return view('site.faqs', [
            'faqs' => Faq::all()
        ]);
    }

    public function Shop()
    {
        return view('site.shop', [
            'categories' => Category::all(),
            'products' => Product::all()
        ]);
    }

    public function Blog()
    {
        return view('site.blog', [
            'blogs' => Blog::paginate(6)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Blog $blog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showBlog(Blog $blog)
    {
        return view('site.blog-details', [
            'blog' => $blog,
            'recent' => Blog::latest()->take(10)->get()
        ]);
    }


}
