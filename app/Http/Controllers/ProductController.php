<?php

namespace App\Http\Controllers;

use App\Jobs\AdminNotificationJob;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Notifications\NewProductNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Product::with(['subcategory' => function ($query) {
            $query->with('category');
        }])->paginate(20);
        // $data = Product::with('subcategory')->with('category')->paginate(20); // N+1
        // return dd($data);
        return response()->view('cms.products.index', ['products' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return response()->view('cms.products.create', [
            'categories' => $categories,
            'subcategories' => $subcategories,
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

        $request->validate([
            'name' => 'required|string|min:3|max:45',
            'description' => 'nullable|string',
            'image' => 'required',
            'price' => 'required',
            'subcategory_id' => 'required',

        ]);

        $request_data = $request->all();


            $request_data = $request->except('image');
            $request_data['image'] = $request->file('image')->store('products_images', 'public');


            $isSaved =   Product::create($request_data);



        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //

        $subcategories = Subcategory::all();
        return response()->view('cms.products.edit', [
            'product' => $product,
            'subcategories' => $subcategories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {


        $request->validate([
            'name' => 'required|string|min:3|max:45',
            'description' => 'nullable|string',
            'image' => 'required',
            'price' => 'required',
            'subcategory_id' => 'required',

        ]);

        $request_data = $request->all();


            $request_data = $request->except('image');
            $request_data['image'] = $request->file('image')->store('products_images', 'public');


            $product->update($request_data);



        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product ,$id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->back();
    }


}
