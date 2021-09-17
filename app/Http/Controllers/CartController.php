<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Products;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function addToCart($idProduct)
    {
        $product = Products::find($idProduct);

        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $cart->add($product);

        session()->put('cart', $cart);

        return back();
    }

    function index()
    {
        $cart = session()->get('cart');
        return view('shop.cart', compact('cart'));
    }

    function deleteToCart($idProduct)
    {
        $product = Products::find($idProduct);
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $cart->delete($product);
        session()->put('cart', $cart);

        return back();
    }
}
