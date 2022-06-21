<?php

namespace App\Http\Controllers;

use App\models\AllQuizes;
use App\models\GroupsTeachers;
use App\User;
use App\Mail\Contactus;
use App\models\Groups;
use App\models\GroupsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MokaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $groupsId = GroupsUsers::where('user_id',Auth::guard('web')->user()->id)->get();
        return view('site.index',compact('groupsId'));
    }

    public function sendMailCotactUs(Request $request)
    {
        $messagee = $request->message;
        $emaill = Auth::guard('web')->user()->email;
        $namee = Auth::guard('web')->user()->name;
        $subjectt = $request->subject;
        Mail::to('eventsup9@gmail.com')->send(new Contactus($messagee, $emaill, $namee, $subjectt));

        return redirect()->back()->with('success','email successfully send');
    }

    public function edit()
    {
        return view('site.edit_profile');
    }

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
                'city' => $request->city,
                'discription' => $request->discription,
            ]);

        }
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    public function dateIsBetweem($from,$to){
        date_default_timezone_set('Africa/Cairo');
        $paymentDate = date('Y/m/d');
        $contractDateBegin = date_format(date_create($from), 'Y/m/d');
        $contractDateEnd = date_format(date_create($to), 'Y/m/d');
        if ($paymentDate >= $contractDateBegin && $paymentDate <= $contractDateEnd) {
            //return 1 . ' '. $paymentDate . ' '.$contractDateBegin . ' '. $contractDateEnd;
            return 1;
        } else {
            // return 0 .' ' . $paymentDate . ' '. $contractDateBegin . ' '. $contractDateEnd;
            return 0;
        }
    }
    public function groupDetails($id)
    {
        $exams = AllQuizes::where('group_id',$id)->where('type','exam')->get();
        foreach($exams as $exam){
            if($exam->is_publisher == 1) {
                $published = $this->dateIsBetweem($exam->from, $exam->to);
                $exam->update([
                    'is_publisher' => $published,
                ]);
            }
        }
        $quiz = AllQuizes::where('group_id',$id)->where('type','quiz')->get();
        foreach($quiz as $exam){
            if($exam->is_publisher == 1) {
                $published = $this->dateIsBetweem($exam->from, $exam->to);
                $exam->update([
                    'is_publisher' => $published,
                ]);
            }
        }
        $questionBank = AllQuizes::where('group_id',$id)->where('type','questionBank')->get();
        foreach($questionBank as $exam){
            if($exam->is_publisher == 1) {
                $published = $this->dateIsBetweem($exam->from, $exam->to);
                $exam->update([
                    'is_publisher' => $published,
                ]);
            }
        }

        $group = Groups::find($id);
        $groups = Groups::get();
        $students = GroupsUsers::where('group_id',$id)->get();
        $teachers = GroupsTeachers::where('group_id',$id)->where('is_publisher',1)->get();
        return view('site.details.main', compact('group','id','exams','quiz','questionBank', 'groups','students','teachers'));
    }
}
