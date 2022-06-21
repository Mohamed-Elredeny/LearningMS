<?php

namespace App\Http\Controllers\Auth;

use App\models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TeacherRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:teacher');
    }

    public function showRegisterForm()
    {
        return view('auth.teacher-register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:teachers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $request['password'] = Hash::make($request->password);
        Teacher::create($request->all());

        return redirect()->intended(route('teacher.dashboard'));
    }
}
