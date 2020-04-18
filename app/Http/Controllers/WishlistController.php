<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function WishlistAdd($id)
    {
        Wishlist::create([
            'product_id' => $id,
            'ip_address' => request()->ip()
        ]);
        return back();
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
