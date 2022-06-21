<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function login($password,$email)
    {
        // Validate form data
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required|min:8'
        // ]);

        // Attempt to log the user in
        if(Auth::guard('web')->attempt(['email' => $email, 'password' => $password]))
        {
            return redirect()->route('home');
            // return 'user login';
        }

        // // if unsuccessful
        return redirect()->back()->with('error','البريد الالكتروني او كلمة المرور غير صحيحة');

        // return 'user';
    }
}
