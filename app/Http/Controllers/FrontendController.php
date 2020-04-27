<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Best_seller;
use App\Blog;
use App\Cart;
use App\Category;
use App\Coupon;
use App\Faq;
use App\Message;
use App\Order_list;
use App\Product;
use App\ProductMultiplePhoto;
use App\Testimonial;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        return view('index', [
            'categories' => Category::all(),
            'banners' => Banner::all(),
            'products' => Product::all(),
            'testimonials' => Testimonial::all(),
            'best_seller' => Best_seller::orderby('ordered', 'desc')->take(4)->get()
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

    public function checkCoupon($coupon_name = '')
    {
        $coupon = Coupon::where('coupon_name', $coupon_name);
        if ($coupon->exists()) {
            $coupon = $coupon->first();
            if ($coupon->validity_till >= Carbon::now()->format('Y-m-d')) {
                return view('site.cart', [
                    'cart' => Cart::where('ip_address', \request()->ip())->get(),
                    'discount' => $coupon->discount_amount,
                    'coupon_name' => $coupon->coupon_name
                ]);
            } else {
                return back()->with('invalid', 'Invalid Coupon');
            }
        }
        return back()->with('invalid', 'Invalid Coupon');
    }
}
