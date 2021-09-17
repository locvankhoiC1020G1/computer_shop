<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function home()
    {
        $products = Products::all();
        return view('shop.home', compact('products'));
    }

    public function master()
    {
        return view('shop.master');
    }

    public function cart()
    {
        return view('shop.cart');
    }

    public function checkout()
    {
        return view('shop.checkout');
    }

    public function detail($id)
    {
        $product = Products::findOrFail($id);
        return view('shop.productDetail',compact('product'));
    }

    public function list()
    {
        $products = Products::paginate(10);

        return view('shop.list',compact('products'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');

        // nếu k có gì nhập trong ô tìm kiếm thì quay lại trang index
        if (!$keyword) {
            return redirect()->route('product.index');
        }
        $products = Products::where('name', 'LIKE', '%' . $keyword . '%')->paginate(10);
        return view('shop.home', compact('products'));
    }


}
