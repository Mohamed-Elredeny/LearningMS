<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeacherLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:teacher')->except('logout');
    }

    public function showLoginForm()
    {

        return view('auth.teacher-login');
    }

    public function login($password,$email)
    {
        // Validate form data
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required|min:8'
        // ]);

        // Attempt to log the user in
        if(Auth::guard('teacher')->attempt(['email' => $email, 'password' => $password]))
        {
            return redirect()->route('teacher.dashboard');
            // return 'user login';
        }

        // // if unsuccessful
        return redirect()->back()->with('error','البريد الالكتروني او كلمة المرور غير صحيحة');

        // return 'user';
    }
}
