<?php

namespace App\Http\Controllers;

use Cart;
use App\Product;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function add_to_cart(){
        //dd(request()->all());

        $pdt = Product::find(request()->pdt_id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => request()->qty,
            'price' => $pdt->price,
            'weight' => 0 
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        return redirect(route('cart'));
    }

    public function cart(){
        
        return view('cart');
    }
    public function cart_delete($rowId){
        
        Cart::remove($rowId);

        return redirect()->back();


    }
    public function incr($rowId, $qty){
        
        Cart::update($rowId, $qty + 1);

        return redirect()->back();

    }

    public function decr($rowId, $qty){
        
        Cart::update($rowId, $qty - 1);

        return redirect()->back();

    }

    public function rapid_add($id){
        $pdt = Product::find($id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => 1,
            'price' => $pdt->price,
            'weight' => 0 
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        return redirect()->back();
    }
}
