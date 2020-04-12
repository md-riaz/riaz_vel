<?php

namespace App\Http\Controllers;

use App\Category;
use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('index', [
            'categories' => Category::all()
        ]);
    }

    public function about()
    {
        return view('site.about');
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
}
