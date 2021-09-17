<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showLogin()
    {
        return redirect()->route('product.index');
    }

    public function index()
    {
        $products = Products::paginate(5);
        return view('product.list', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(StorePostRequest $request)
    {
        $product = new Products();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('image', 'public');
            $product->image = $path;
        }
        $product->save();
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('image', 'public');
            $product->image = $path;
        }
        $product->save();
        return redirect()->route('product.index');
    }

    public function delete($id)
    {
        $product = Products::findOrFail($id);
        Storage::disk('public')->delete($product->image);
        $product->delete();
        return redirect()->route('product.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');

        // nếu k có gì nhập trong ô tìm kiếm thì quay lại trang index
        if (!$keyword) {
            return redirect()->route('product.index');
        }
        $products = Products::where('name', 'LIKE', '%' . $keyword . '%')->paginate(10);
        return view('product.list', compact('products'));
    }
}
