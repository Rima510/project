<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller
{
    //
    public function showLogin()
     {
        return  view('cms.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
               'email'       => 'required|email',
               'password'    => 'required|string|min:3|max:30',

        ]);

        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
           // notify()->success('تم الدخول بنجاح  ');
            return redirect() -> route('admin.home');
        }
       // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);


        

                // $credentials = ['email' => $request->input('email'), 'password'=> $request->input('password') ];
                //  if(Auth::guard('admin')->attempt($credentials )) {
                //       return redirect()->route('admin.home');
                //  }
                //  return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);



    }



    public function logout(Request $request)
    {
        //auth('admin')->logout();
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('auth.login-show');

    }
}
