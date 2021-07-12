<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::with('category')->get();
        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $products = product::all();
        return view('admin.product.create', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:8000',
            'category_id' => 'required'
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);



        $product = new product();
        $product->fill($request->all());
        $product->image = $newImageName;
        $product->save();
        return redirect(route('admin.products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        $categories = Category::all();
        return view('admin.product.show', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $categories = Category::all();

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);

        $updated = product::find($product->id);
        $updated->fill($request->all());
        $updated->image = $product->image;
        $updated->save();


        return view('admin.product.show', [
            'product' => $updated,
            'categories' => $categories
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $delete = product::find($product->id);
        $delete->delete();

        return redirect('admin/products');
    }

    /**
     * Edit image
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function updateImage(Request $request, product $product)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpg,png,jpeg|max:8000',
        ]);

        $newImageName = time() . '-' . $product->name . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        $product->image = $newImageName;
        $product->save();
        return route('admin.products.showImage', [
            'product' => $product
        ]);
    }
    /**
     * Show image
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function showImage(product $product)
    {
        return view('admin.product.changeImage', [
            'product' => $product,
        ]);
    }
}

