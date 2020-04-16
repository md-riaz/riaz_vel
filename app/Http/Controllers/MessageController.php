<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
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
        $msg = Message::all();
        return view('admin.message.index', compact('msg'));
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return back()->with('success_message', 'Message sent to trash!');
    }

    public function trash()
    {
        return view('admin.message.trash', [
            'trash' => Message::onlyTrashed()->get()
        ]);
    }

    public function restore($id)
    {
        Message::onlyTrashed()->findOrFail($id)->restore();
        return redirect('messages')->with('success_message', 'Message successfully restored');
    }

    public function HardDelete($id)
    {
        Message::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect('messages')->with('success_message', 'Message permanently deleted');
    }
}
