<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
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

    public function index()
    {
        return view('admin.faqs.index', [
            'faqs' => Faq::all()
        ]);
    }

    public function store()
    {
        Faq::create(request()->validate([
                'faq_question' => 'required',
                'faq_answer' => 'required'
            ]) + [
                'user_id' => Auth::user()->id
            ]);

        $notification = 'FAQ Added Successfully.';
        return back()->with('success_message', $notification);
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return back()->with('delete_status', 'FAQ Deleted Successfully');
    }
}
