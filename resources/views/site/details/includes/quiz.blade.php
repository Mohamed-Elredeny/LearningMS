<div id="quiz" class="tab-pane fade in ">


    <div class="container pt-4">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h5>الكويزات الحالية</h5>
            </div>
            @foreach($quiz as $exam)
                @if($exam->is_publisher == 1)
                    <div class="col-sm-4 pt-2">
                        <div class="card text-center">
                            <div class=" btn btn-success">
                                متاح
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$exam->name}}</h5>

                                <div class="container text-center h6">
                                    <div class="row">
                                        <div class="col">
                                            تاريخ البداية
                                        </div>
                                        <div class="col">
                                            {{date_format(date_create($exam->from),'d-m-y')}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            تاريخ النهاية
                                        </div>
                                        <div class="col">
                                            {{date_format(date_create($exam->to),'d-m-y')}}
                                        </div>
                                    </div>
                                </div>

                                <div class=" text-center ">
                                    <?php $user_answer =  \App\models\UserAnswers::where('user_id',auth::user()->id)->where('all_quize_id',$exam->id)->get() ?>
                                    @if(count($user_answer) < 1)
                                        <a href="{{route('student.view.exam',['exam_id'=>$exam->id])}}" class="btn btn-dark col-sm-9" target="_blank">بدء الكويز</a>
                                    @else
                                        <a href="{{route('student.exam.result',['answer_id'=>$user_answer[0]->id])}}" class="btn btn-dark col-sm-9 mt-1" target="_blank"> عرض النتيجة</a>
                                    @endif
                                </div>

                            </div>

                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
