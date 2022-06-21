<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\AllQuizes;
use App\models\AllQuizesQuestions;
use App\models\Questions;
use Illuminate\Http\Request;

class QuestionsController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->image){
            $fileName = $request->image->getClientOriginalName();
            $file_to_store = time() . '_' . $fileName ;
            $request->image->move(public_path('assets/images/questions'), $file_to_store);
        }else{
            $file_to_store =null;
        }
        $exam_id= $request->exam_id;
        $type=  $request->type;
        if($type == 'mcq') {
            $mcq1 = $request->mcq1;
            $mcq2 = $request->mcq2;
            $mcq3 = $request->mcq3;
            $mcq4 = $request->mcq4;
            $answers = $mcq1.'|'.$mcq2.'|'.$mcq3.'|'.$mcq4;
            $correct= ($request->mcq)-1;

        }else{
            $tf1 = $request->tf1;
            $tf2 = $request->tf2;
            $answers = $tf1.'|'.$tf2;
            $correct= ($request->tf)-1;
        }
        $question = Questions::create([
            'question'=>$request->body,
            'answers'=>$answers,
            'correct'=>$correct,
            'type'=>$type,
            'image'=>$file_to_store
        ]);
        AllQuizesQuestions::create([
           'all_quize_id'=>$exam_id,
            'question_id'=>$question->id
        ]);
        return redirect()->back()->with('success','Question added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 1;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $question = Questions::find($id);
        $question->update([
            'question',
            'answers',
            'correct',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Questions::destroy($id);
        return redirect()->back();
    }
    public function removeQuestion($id){
        Questions::destroy($id);
        return redirect()->back();
    }
    public function editAllQuestions(Request $request,$exam_id,$type){
        //Mcq
        //TF
        $quiz = AllQuizes::find($exam_id);
        $questionns = AllQuizesQuestions::where('all_quize_id',$exam_id)->get();

        foreach($questionns as $question ){

            if($question->question->type == $type) {
                $answers=[];
                if($type == 'mcq'){
                   $k_limit = 4;
                }else{
                    $k_limit = 2;
                }

                for($k=0;$k<$k_limit;$k++) {
                    $answers [] = $request['answers' . $question->id . $k];
                }
                $answers = implode('|',$answers );
                if($request['image'. $question->id]){
                    $fileName = $request['image'. $question->id]->getClientOriginalName();
                    $file_to_store = time() . '_' . $fileName ;
                    $request['image'. $question->id]->move(public_path('assets/images/questions'), $file_to_store);
                }else{
                    $file_to_store = $question->question->image;
                }
                if($request['removeimage'. $question->id] == 1){
                    $file_to_store =null;
                }
                $question->question->update([
                    'question' => $request->input('question' . $question->id),
                    'image'=> $file_to_store,
                    'correct'=>$request['flexRadioDefault'. $question->id],
                    'answers'=>$answers
                ]);
            }
        }
        return redirect()->back();
       /* $question = Questions::find($exam_id);
        $question->update([
            'correct'=>$request->correct
        ]);
       */
    }
}
