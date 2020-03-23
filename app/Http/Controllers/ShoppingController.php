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

        $cart = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => request()->qty,
            'price' => $pdt->price,
            'weight' => 0 
        ]);

        return redirect(route('cart'));
    }

    public function cart(){
        return view('cart');
    }
}
