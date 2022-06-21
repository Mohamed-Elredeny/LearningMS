<?php

namespace App\Http\Controllers\Teacher;

use App\User;
use App\models\Groups;
use App\models\GroupsUsers;
use Illuminate\Http\Request;
use App\models\GroupsTeachers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = GroupsTeachers::where('teacher_id', Auth::guard('teacher')->user()->id)->where('type','teacher')->get();
        return view('teacher.users.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = GroupsTeachers::where('teacher_id', Auth::guard('teacher')->user()->id)->where('type','teacher')->get();
        // $groups = Groups::get();
        return view('teacher.users.create', compact('groups'));
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
            $request->image->move(public_path('assets/images/users'), $file_to_store);

            $real_password = $request->password;
            $request['password'] = Hash::make($request->password);

            $user = User::insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'real_password' => $real_password,
                'phone' => $request->phone,
                'gender'=>$request->gender,
                'image'=> $file_to_store,
            ]);

            foreach ($request->groups_id as $group) {
                GroupsUsers::create([
                    'user_id' => $user,
                    'group_id' => $group,
                ]);
            }
            return redirect()->route('teacherUsers.index')->with('success', 'تم الاضافة بنجاح');
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
        $admin = User::find($id);
        return view('teacher.users.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::find($id);

        $myGroupsId = GroupsUsers::select('group_id')->where('user_id', $id)->get();
        $myGroups = GroupsUsers::where('user_id', $id)->get();

        $groups = Groups::whereNotIn(
            'id',
            $myGroupsId
        )->get();
            // return $groups;
        return view('teacher.users.edit', compact('admin','groups','myGroups'));
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
        $users = User::find($id);
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
                unlink(public_path('assets/images/users') .'/' . $users->image);
                $fileName = $request->image->getClientOriginalName();
                $file_to_store = time() . '_' . $fileName ;
                $request->image->move(public_path('assets/images/users'), $file_to_store);

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

            $myGroups = GroupsUsers::where('user_id', $users->id)->get();
            $arr[]=0;
            foreach ($myGroups as $myGroup) {
                array_push($arr, $myGroup->group_id);
            }
            // return $arr;

            foreach ($request->groups_id as $group) {

                // return $group;
                if(!in_array($group, $arr))
                {
                    GroupsUsers::create([
                        'user_id' => $users->id,
                        'group_id' => $group,
                    ]);
                }
            }

            // return $request->groups_id;
            foreach ($myGroups as $groupp) {
                if(!in_array((string)$groupp->group_id, $request->groups_id))
                {
                    $old = GroupsUsers::where('group_id', $groupp->group_id)->where('user_id', $users->id)->get();
                    $old[0]->delete();
                }
            }

        }
        return redirect()->route('teacherUsers.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = User::find($id);
        $old->delete();
        return redirect()->route('teacherUsers.index')->with('success', 'تم الحذف بنجاح');
    }
}
