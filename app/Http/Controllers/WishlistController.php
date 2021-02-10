<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class WishlistController extends Controller
{
    public function addWishlist($id){
        $userid = Auth::id();
        $check = DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();

        $data = array([
            'user_id' => $userid,
            'product_id' => $id,
            'created_at' => new \DateTime()
        ]);
        
        // check login or not
        if(Auth::Check()){
            if ($check) {
                return \Response::json(['error' => 'Your Product Already Has On Wishlist']);
            }else{
                DB::table('wishlists')->insert($data);
                return \Response::json(['success' => 'Product Added On Wishlist']);
            }
        }else{
            return \Response::json(['error' => 'At First Login Your Account']);
        }
    }
}
