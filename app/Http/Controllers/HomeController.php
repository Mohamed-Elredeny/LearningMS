<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function checkAuthLogin(Request $request)
    {
        if($request->type == 'admin')
        {
            return redirect()->route('admin.login',['password'=> $request->password, 'email'=>$request->email]);
        }
        elseif($request->type == 'teacher')
        {
            return redirect()->route('teacher.login',['password'=> $request->password, 'email'=>$request->email]);
        }
        elseif($request->type == 'user')
        {
            return redirect()->route('user.login',['password'=> $request->password, 'email'=>$request->email]);
        }
        return 'sad';
    }

}
