<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Social;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('front.index',[
            'products' => $products,
            'categories' => $categories
        ]);
    }
    public function contact(Request $request)
    {

        $request->validate([

            'name' => 'required|string|min:3|max:45',
            'email' => 'required|email|string|min:3|max:45',
            'subject' => 'required|string|min:3|max:45',
            'message' => 'required|string|min:3|max:45',
        ]);
        $contact = new Contact();
        $contact->name = $request-> name;
        $contact->email = $request-> email;
        $contact->subject = $request-> subject;
        $contact->message = $request->message ;
        $contact->save();
        return redirect()->back();

    }
    public function contactUs()
    {
        return view('front.contact');
    }
    public function about()
    {
        $items = Social::all();

        return view('front.about',compact('items'));
    }
}
