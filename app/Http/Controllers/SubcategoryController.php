<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Subcategory::with('category')->get();
        return  view('cms.subcategories.index',['subcategories'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories  = Category::all();
        return  view('cms.subcategories.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' =>'required|string|max:100',
            'description' => 'nullable|max:150',

        ]);

            $subcategory = new Subcategory();
            $subcategory->name = $request->input('name') ;
            $subcategory->description = $request->input('description') ;
            $subcategory->category_id = $request->input('category_id') ;

            $isSave = $subcategory->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        //
        $categories = Category::all();
        return view('cms.subcategories.edit',['subcategory'=>$subcategory,'categories' =>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        //

        $request->validate([
            'name' =>'required|string|max:100',
            'description' => 'nullable|max:150',

        ]);
            $subcategory->name = $request->input('name') ;
            $subcategory->description = $request->input('description') ;
            $subcategory->category_id = $request->input('category_id') ;

            $isSave = $subcategory->save();
        return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory ,$id)
    {
        Subcategory::findOrFail($id)->delete();
        return redirect()->back();

    }

}
