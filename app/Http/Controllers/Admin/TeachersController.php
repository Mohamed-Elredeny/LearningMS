<?php

namespace App\Http\Controllers\Admin;

use App\models\Groups;
use App\models\GroupsTeachers;
use App\models\GroupsUsers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeachersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $admins = Teacher::get();
        return view('admin.teachers.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Groups::get();
        return view('admin.teachers.create',compact('groups'));
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
            $request->image->move(public_path('assets/images/teachers'), $file_to_store);

            $real_password = $request->password;
            $request['password'] = Hash::make($request->password);

           $user= Teacher::insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'real_password' => $real_password,
                'phone' => $request->phone,
                'gender'=>$request->gender,
                'image'=> $file_to_store,
            ]);
            foreach ($request->groups_id as $group) {
                GroupsTeachers::create([
                    'teacher_id' => $user,
                    'group_id' => $group,
                    'is_publisher'=>1,
                    'type'=>'teacher'
                ]);
            }
            return redirect()->route('teachers.index')->with('success', 'تم الاضافة بنجاح');
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
        $admin = Teacher::find($id);
        return view('admin.teachers.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Teacher::find($id);

        $myGroupsId = GroupsTeachers::select('group_id')->where('teacher_id', $id)->get();
        $myGroups = GroupsTeachers::where('teacher_id', $id)->get();
        $groups = Groups::whereNotIn(
            'id',
            $myGroupsId
        )->get();
        // return $groups;
        return view('admin.teachers.edit', compact('admin','groups','myGroups'));
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
        $users = Teacher::find($id);
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
                unlink(public_path('assets/images/teachers') .'/' . $users->image);
                $fileName = $request->image->getClientOriginalName();
                $file_to_store = time() . '_' . $fileName ;
                $request->image->move(public_path('assets/images/teachers'), $file_to_store);

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
        return redirect()->route('teachers.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = Teacher::find($id);
        $old->delete();
        return redirect()->route('teachers.index')->with('success', 'تم الحذف بنجاح');
    }
}
