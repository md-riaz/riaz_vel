<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function WishlistAdd($id)
    {
        $ip_add = request()->ip();
        $selected_column = Wishlist::where('product_id', $id)->where('ip_address', $ip_add);

        if ($selected_column->exists()) {
            return back()->with('success', 'Already in wishlist');
        } else {
            Wishlist::create([
                'product_id' => $id,
                'ip_address' => request()->ip()
            ]);
            return back()->with('success', 'Added to wishlist');
        }


    }

    public function show()
    {
        return view('site.wishlist', [
            'wishlists' => Wishlist::all()
        ]);
    }

    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return back()->with('status', 'Item removed');
    }
}
