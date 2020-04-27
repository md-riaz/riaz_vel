<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return view('admin.address.index', [
            'address' => Address::findOrfail(1)->first()
        ]);
    }

    public function update()
    {
        Address::find(1)->update(\request()->validate([
            'phone_number' => 'required | max:15',
            'email' => 'required |',
            'address' => 'required',
            'facebook_url' => 'required',
            'twitter_url' => 'required',
            'linkedin_url' => 'required',
            'gplus_url' => 'required'
        ]));
        return back()->with('success', 'Changes Saved');
    }
}
