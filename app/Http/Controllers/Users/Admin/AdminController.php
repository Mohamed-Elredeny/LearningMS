<?php

namespace App\Http\Controllers\Users\Admin;

use App\User;
use App\models\Admin;
use App\models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Groups;
use App\models\GroupsTeachers;
use App\models\GroupsUsers;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin');
    }

    public function home()
    {
        $usersNum = User::count();
        $teacherNum = Teacher::count();
        $adminNum = Admin::count();
        $groupNum = Groups::count();
        $groups = Groups::get();

        // المجموعة كام طالب و كام مدرس

        $x='';
        $y ='';
        $z = '';
        $a ='';
        $b = '';
        foreach ($groups as $group) {
            $users = GroupsUsers::where('group_id', $group->id)->count();
            $teachers = GroupsTeachers::where('group_id', $group->id)->where('type','teacher')->count();

            $x .= $users;
            $usersCount['users'][] = $users;
            $y .= $teachers;
            $teachersCount['teachers'][] = $teachers;

        }

        $xx = '';
        $yy = '';

        for($i=0;$i<count($usersCount['users']) ;$i++)
        {
            $xx .= ',' . $usersCount['users'][$i];
            $yy .= ',' . $teachersCount['teachers'][$i];
        }
        return view('admin.home',compact('usersNum', 'teacherNum', 'adminNum', 'groupNum','groups','xx','yy'));
    }
}
