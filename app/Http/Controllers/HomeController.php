<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $user_name_logged = Auth::user();
        $total_users = count($users);
        $last_user = User::latest('created_at')->first();
        return view('home', [
            'users' => $users,
            'total' => $total_users,
            'last_user' => $last_user,
            'logged_name' => $user_name_logged
        ]);
    }
}
