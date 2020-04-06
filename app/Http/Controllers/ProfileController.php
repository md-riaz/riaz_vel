<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index'); // Go to index page from admin/profile folder
    }
    public function profile_post(Request $request)
    {
        $request->validate([
            'name' => 'required' // Validate name field data to be required
        ]);

        // Find user from database with Auth::id() method and then update the name field with new name from $request->name
        User::find(Auth::id())->update([
            'name' => $request->name
        ]);

        $old_name = Auth::user()->name; // store old name to a variable
        return back()->with('success_message', 'Your name updated from ' . $old_name . ' to ' . $request->name); // Return back with success message
    }

    // Change password method
    public function password_post(Request $request)
    {
        // First validate data
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        // Check if current password and new password are same or not
        if ($request->old_password == $request->password) {
            return back()->withErrors('Your old password cannot be your new passwoed'); //send error messege to $error variable
        }

        $old_password = $request->old_password; //current password from html form
        $database_password = Auth::user()->password; // password from database
        // Check current password with db password
        if (Hash::check($old_password, $database_password)) {
            // matches then update with new password and hash it also
            User::find(Auth::id())->update([
                'password' => Hash::make($request->password)
            ]);
            return back()->with('password_change_status', 'Your password changed successfully');
        } else {
            return back()->withErrors('Your old password does not match database password');
        }
    }
}
