<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class PagesController extends Controller
{
    public function index(){
        $products = product::limit(4)->get();
        return view('index', ['products' => $products]);
    }

    public function about(){
        return view('about');
    }

    public function shop(){
        $products = product::all();
        return view('products.shop', ['products' => $products]);
    }
    public function contact(){
        return view('contact');
    }
}
