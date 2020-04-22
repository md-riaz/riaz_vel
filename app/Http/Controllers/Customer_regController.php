<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class Customer_regController extends Controller
{
    public function index()
    {
        return view('site.customer_reg');
    }

    public function store()
    {
        // First validate data
        $validateData = request()->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required'
        ]);
        User::create($validateData + [
                'role' => 2
            ]);
        return redirect('checkout');

    }
}
