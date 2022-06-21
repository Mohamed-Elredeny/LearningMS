<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\models\AllQuizes;
use App\models\AllQuizesQuestions;
use App\models\GroupsTeachers;
use App\models\Questions;
use App\models\UserAnswers;
use App\User;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function getUserRank($rank,$user_id){
        $user_rank = 1;
        foreach($rank as $r){
            if($r->user_id == $user_id){
                break;
            }
            $user_rank++;
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$type)
    {
        $teachers =GroupsTeachers::where('group_id',$id)->where('is_publisher',1)->get();
        $group_id =$id;
        return view('teacher.groups.exams.create',compact('teachers','group_id','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeWithType(Request $request,$type){
        AllQuizes::create([
            'type'=>$type,
            'name'=>$request->name,
            'description'=>$request->description,
            'total_score'=>$request->totalScore,
            'time_of_quiz'=>$request->duration,
            'from'=>$request->from,
            'to'=>$request->to,
            'groups_teacher_id'=>$request->teacher,
            'group_id'=>$request->group_id,
            'is_publisher'=>1,
            'show_wrong_answers'=>intval($request->show_wrong_answers),
            'show_all_answers'=>intval($request->show_all_answers),
            'show_right_answers'=>intval($request->show_right_answers)
        ]);
        return redirect()->back()->with('success','تم انشاء الاختبار بنجاح');
    }
    public function store(Request $request)
    {
        $type = 'exam';
        AllQuizes::create([
            'type'=>$type,
            'name'=>$request->name,
            'description'=>$request->description,
            'total_score'=>$request->totalScore,
            'time_of_quiz'=>$request->duration,
            'from'=>$request->from,
            'to'=>$request->to,
            'groups_teacher_id'=>$request->teacher,
            'group_id'=>$request->group_id,
            'is_publisher'=>1,
            'show_wrong_answers'=>intval($request->show_wrong_answers),
            'show_all_answers'=>intval($request->show_all_answers),
            'show_right_answers'=>intval($request->show_right_answers)

        ]);
        return redirect()->back()->with('success','تم انشاء الاختبار بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam_id  = $id;
        $questions = AllQuizesQuestions::where('all_quize_id',$exam_id)->get();
        return view('teacher.groups.exams.exam', compact('exam_id', 'questions'));
    }

    public function editExamDetails(Request $request,$exam_id){
        $exam = AllQuizes::find($exam_id);
        $exam->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'from'=>$request->from,
            'to'=>$request->to,
            'total_score'=>$request->total_score,
            'time_of_quiz'=>$request->time_of_quiz,
            'show_wrong_answers'=>intval($request->show_wrong_answers),
            'show_all_answers'=>intval($request->show_all_answers),
            'show_right_answers'=>intval($request->show_right_answers)
        ]);
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewExam($exam_id)
    {
        $questions =AllQuizesQuestions::where('all_quize_id',$exam_id)->get();
        $exam = AllQuizes::find($exam_id);
        return view('site.exam.exam',compact('exam_id','questions','exam'));
    }
    public function solveExam(Request $request){
        $quiz_id = $request->exam_id;
        $user_id = 2;
        $user_answers = [];
        $wrong_answers = [];
        $one_question_score = $request->one_question_score;
        $student_score = 0;

        $quiz_questions = AllQuizesQuestions::where('all_quize_id',$quiz_id)->get();


        foreach ($quiz_questions as $question){
            $oneAnswer = $request->input('answer'.$question->id);
            $realQuetion =Questions::find($question->id)->id;

            if($oneAnswer != $realQuetion){
                $right_answer = 0;
                $wrong_answers [] =[
                    'id' => $question->id,
                    'answer'=>$oneAnswer,
                    'state'=>$right_answer
                ];
            }else{
                $right_answer = 1;
                $student_score += $one_question_score;
            }
            $user_answers [] =[
                'id' => $question->id,
                'answer'=>$oneAnswer,
                'state'=>$right_answer
            ];
        }
        $answers = json_encode($user_answers);
        $wrong_answers = json_encode($wrong_answers);

        $answer_id =UserAnswers::insertGetId([
            'all_quize_id'=>$quiz_id,
            'user_id'=>$user_id,
            'mark'=>$student_score,
            'wrog_answers'=>$wrong_answers,
            'answers'=>$answers
        ]);

        return redirect()->route('student.exam.result',['answer_id'=>$answer_id]);

    }
    public function publishOrHide($type,$id){
        $quiz = AllQuizes::find($id);
        switch($type){
            case 'hide':
                $quiz->update([
                   'is_publisher'=>0
                ]);
                break;
            case 'show':
                $quiz->update([
                    'is_publisher'=>1
                ]);
                break;
        }
        return redirect()->back();
    }
    public function studentsAnswers($group_id,$exam_id){
        date_default_timezone_set('Africa/Cairo');

        $admins = UserAnswers::where('all_quize_id',$exam_id)->get();
        $exam = AllQuizes::find($exam_id);
        //Total Score
        $total_score = $exam->total_score;
        foreach($admins as $admin) {
            if($admin->mark >= ($total_score/2)) {
                $admin->state = 'ناجح';
            }else{
                $admin->state = 'راسب';
            }
            //$score = $admin->mark;
            $admin->answers_num =  count(json_decode($admin->answers));
            $admin->right_answers_num = count(json_decode($admin->answers)) -  count(json_decode($admin->wrog_answers));
            $admin->wrong_answers_num = count(json_decode($admin->wrog_answers));
            $admin->day = date('d-m-y', strtotime($admin->updated_at));
            $admin->time =  date('h-i A', strtotime($admin->updated_at));
        }

        return view('teacher.groups.exams.answers',compact('admins','group_id','exam_id'));
    }
    public function studentsRank($group_id,$exam_id){
        $admins = UserAnswers::where('all_quize_id',$exam_id)->orderBy('mark', 'desc')->get();
        return view('teacher.groups.exams.rank',compact('admins','group_id'));
    }

    public function viewResult($answer_id){
        $user_id =4;
        $UserAnswers = UserAnswers::find($answer_id);
        $count_questions = AllQuizesQuestions::where('all_quize_id',$UserAnswers->all_quize_id)->count();
        $rank = UserAnswers::where('all_quize_id',$UserAnswers->all_quize_id)->orderBy('mark', 'desc')->get();
        //rank
        $user_rank = 1;
        foreach($rank as $r){
            if($r->user_id == $user_id){
                break;
            }
            $user_rank++;
        }
        return view('site.exam.result',compact('answer_id','UserAnswers','count_questions','rank','user_rank'));
    }
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
