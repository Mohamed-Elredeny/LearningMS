<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $admins = Admin::get();
        return view('admin.admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'gender'=>'required',
            'image' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        } else {
            $fileName = $request->image->getClientOriginalName();
            $file_to_store = time() . '_' . $fileName ;
            $request->image->move(public_path('assets/images/admins'), $file_to_store);

            $real_password = $request->password;
            $request['password'] = Hash::make($request->password);

            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'real_password' => $real_password,
                'phone' => $request->phone,
                'gender'=>$request->gender,
                'image'=> $file_to_store,
            ]);
            return redirect()->route('admins.index')->with('success', 'تم الاضافة بنجاح');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::find($id);
        return view('admin.admins.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = Admin::find($id);
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'gender'=>'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            if ($request->image) {
                unlink(public_path('assets/images/admins') .'/' . $users->image);
                $fileName = $request->image->getClientOriginalName();
                $file_to_store = time() . '_' . $fileName ;
                $request->image->move(public_path('assets/images/admins'), $file_to_store);

            }
            else{
                $file_to_store = $users->image;
            }

            $real_password = $request->password;
            $request['password'] = Hash::make($request->password);

            $users->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'real_password' => $real_password,
                'phone' => $request->phone,
                'gender'=>$request->gender,
                'image'=> $file_to_store,
            ]);

        }
        return redirect()->route('admins.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = Admin::find($id);
        $old->delete();
        return redirect()->route('admins.index')->with('success', 'تم الحذف بنجاح');
    }
}
