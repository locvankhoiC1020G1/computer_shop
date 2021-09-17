<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function getAll()
    {
        $products = Products::all();
    }
}
