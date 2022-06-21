<?php

namespace App\Http\Controllers\Users\Teacher;

use App\User;
use App\models\Admin;
use App\models\Groups;
use App\models\Teacher;
use App\models\GroupsUsers;
use Illuminate\Http\Request;
use App\models\GroupsTeachers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function index()
    {
        return view('teacher');
    }

    public function home()
    {
        $groupsTeacher = GroupsTeachers::where('teacher_id', Auth::guard('teacher')->user()->id)->where('type','teacher')->get();

        // $usersNum = count($groupsTeacher->group);
        $groupNum = count($groupsTeacher);
        // $groups = Groups::find();
        $usersNum = 0;
        foreach ($groupsTeacher as $groupsTeacherr) {
            $groups = $groupsTeacherr->group;
            $usersNum += GroupsUsers::where('group_id',$groups->id)->count();
        }

        // المجموعة كام طالب و كام مدرس

        $x='';
        $y ='';
        $z = '';
        $a ='';
        $b = '';
        // $groups = [];
        foreach ($groupsTeacher as $groupsTeacherrr) {
            $users = GroupsUsers::where('group_id', $groupsTeacherrr->id)->count();
            $teachers = GroupsTeachers::where('group_id', $groupsTeacherrr->id)->where('type','teacher')->count();
            $grouppp = Groups::where('id', $groupsTeacherrr->id)->get();

            $x .= $users;
            $usersCount['users'][] = $users;
            $y .= $teachers;
            $teachersCount['teachers'][] = $teachers;

            $groups['names'] = $grouppp;



        }

        $xx = '';
        $yy = '';

        for($i=0;$i<count($usersCount['users']) ;$i++)
        {
            $xx .= ',' . $usersCount['users'][$i];
            $yy .= ',' . $teachersCount['teachers'][$i];
        }
        return view('teacher.home',compact('usersNum', 'groupNum','groups','xx','yy'));
    }
}
