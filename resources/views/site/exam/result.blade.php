<link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/exam.css')}}">
<style>
    a:hover{
        text-decoration: none;
        color:white
    }
</style>
<div class="container ">
    <div class="row text-center">
        <div class="col-sm-12">
            <br><br>
            <h2 style="color:white;font-weight:bolder;cursor:pointer;">
                <a href="{{route('site.group.details',['id'=>$UserAnswers->quiz->group_id])}}">
                    العودة للتفاصيل المجموعه
                </a>
            </h2>
        </div>
    </div>
    <div class="row result mt-5" >
        <div class="col-sm-12 row text-center h4">

            <div class="col-lg-6  col-sm-12  ">
                <div class="result-circle">
                    درجة  الطالب

                    <br>
                    {{$UserAnswers->mark}}
                </div>

            </div>
            <div class="col-lg-6  col-sm-12  ">
                <div class="result-circle">
                    الدرجة الكليه
                    <br>
                    {{$UserAnswers->quiz->total_score}}
                </div>

            </div>

            <div class="col-lg-6  col-sm-12">
                <div class="result-circle">
                    عدد الاسئلة غير الصحيحة
                    <br>
                    {{$wrong = count(\GuzzleHttp\json_decode($UserAnswers->wrog_answers))}}
                    <br>
                    @if($UserAnswers->quiz->show_wrong_answers  == 1)
                        <a href="{{route('student.get.solved.answers',['answer_id'=>$UserAnswers->id,'type'=>'wrong'])}}">عرض</a>
                    @endif

                </div>

            </div>
            <div class="col-lg-6  col-sm-12 ">
                <div class="result-circle">
                    عدد الاسئلة الصحيحة
                    <br>
                    {{$count_questions -$wrong }}
                    <br>
                    @if($UserAnswers->quiz->show_right_answers  == 1)
                        <a href="{{route('student.get.solved.answers',['answer_id'=>$UserAnswers->id,'type'=>'right'])}}">عرض</a>
                    @endif

                </div>
            </div>

            <div class="col-lg-6  col-sm-12 ">
                <div class="result-circle">
                    ترتيب الطالب
                    <br>
                    {{$user_rank}}
                    <br>

                </div>

            </div>
            <div class="col-lg-6 col-sm-12 ">
                <div class="result-circle">
                    حالة الطالب
                    <br>
                    <?php
                    if ( ($UserAnswers->mark) >=  ($UserAnswers->quiz->total_score / 2) ){
                        echo "ناجح";
                    }else{
                        echo "راسب";
                    }

                    ?>
                </div>

            </div>

        </div>
    </div>
</div>
