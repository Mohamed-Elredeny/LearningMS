<div id="questionBank" class="tab-pane fade in ">

    <center>
        <div class="row">

            <div class="col-sm-12">
                <center>
                    <a class="btn btn-dark col-sm-12" href="{{route('groupExams.create',['id'=>$id,'type'=>'questionBank'])}}" target="_blank">اضافة بنك اسئلة جديد</a>
                </center>
            </div>

        </div>

    </center>
    <div class="container pt-4">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h5>بنوك الاسئلة الحالية </h5>
            </div>
            @foreach($questionBank as $exam)
                <div class="col-sm-4 pt-2">
                    <div class="card text-center">
                        @if($exam->is_publisher == 1)
                            <div class=" btn btn-success">
                                منشور
                            </div>
                        @else
                            <div class=" btn btn-danger">
                                مخفي
                            </div>
                        @endif
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

                            <div class="row text-center ">

                                    <a href="{{route('groupExams.show',['groupExam'=>$exam->id])}}" class="btn btn-dark col-sm-12" target="_blank">عرض البنك</a>
                                    @if($exam->is_publisher == 0)
                                        <a href="{{route('groupExams.publishOrHide',['type'=>'show','id'=>$exam->id])}}" class="btn btn-dark col-sm-12 mt-1">نشر</a>
                                    @else
                                        <a href="{{route('groupExams.publishOrHide',['type'=>'hide','id'=>$exam->id])}}" class="btn btn-dark col-sm-12 mt-1">اخفاء</a>
                                    @endif
                                  {{--  <a href="{{route('groupExams.studentsAnswers',['group_id'=>$id,'exam_id'=>$exam->id])}}" class="btn btn-dark col-sm-5 mt-2 ">درجات الطلاب</a>
                                    <a href="{{route('groupExams.studentsRank',['group_id'=>$id,'exam_id'=>$exam->id])}}" class="btn btn-dark col-sm-5 mt-2 ml-1" >تصنيف الطلاب</a>--}}



                            </div>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
