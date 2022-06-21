@extends("layouts.teacher")
@section("pageTitle", "لوحة التحكم")
@section("style")
    <link href="{{asset("assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>
@endsection
@section("content")
    <div class="container">
        <h3>عرض تفاصيل الامتحان</h3>
        <ul class="nav nav-tabs">
            <li class="active ml-3 h5"><a data-toggle="tab" href="#all" class="active">الكل</a></li>
            <li class="active ml-3 h5"><a data-toggle="tab" href="#addQuestion">اضافة اسئلة</a></li>
            <li><a class="ml-3 h5" data-toggle="tab" href="#mcq">اختيار من متعدد</a></li>
            <li><a class="ml-3 h5" data-toggle="tab" href="#tf">صح أم خطا</a></li>
            <li><a class="ml-3 h5" data-toggle="tab" href="#details">تفاصيل الامتحان</a></li>


        </ul>

        <div class="tab-content">
            <div id="all" class="tab-pane active">
                @include('admin.groups.exams.questions.viewQuestions')
            </div>
            <div id="addQuestion" class="tab-pane fade">

                <h3>اضافة سوال جديد</h3>
                @include('admin.groups.exams.questions.addQuestion')
            </div>
            <div id="mcq" class="tab-pane fade">
                <center>
                    <br>
                    <h3>اختيار من متعدد</h3>

                    <br>
                </center>
                <?php $i=1 ?>
                <form action="{{route('edit.question.exam',['exam_id'=>$exam_id,'type'=>'mcq'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="col-sm-12 btn btn-dark" href="">تعديل الكل</button>
                    @foreach($questions as $Onequestion)
                            @if($Onequestion->question->type == 'mcq')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <?php $mcq = "سوال جديد للاختبار سوال جديد للاختبار سوال جديد للاختبار سوال جديد للاختبار سوال جديد للاختبار";?>
                                            <h5 class="card-title"> {{"[ ".$i." ]  "}}
                                                <br><br>
                                                <input class="form-control col-sm-12 " type="text"  name="question{{$Onequestion->question->id}}" value="{{$Onequestion->question->question}}"/>
                                                <br>
                                                <input class=" col-sm-12 " type="file"  name="image{{$Onequestion->question->id}}">

                                            </h5>

                                            @if($Onequestion->question->image != null)

                                                <img src="{{asset('assets/images/questions/'.$Onequestion->question->image )}}" alt="" style="width: 300px;height: 300px">
                                                    <br>
                                                    هل تريد حذف الصورة؟
                                               <div class="form-check">

                                                   <input class="form-check-input" type="radio" name="removeimage{{$Onequestion->question->id}}" value="0" checked>لا<br>
                                                   <input class="form-check-input" type="radio" name="removeimage{{$Onequestion->question->id}}" value="1" >نعم

                                               </div>

                                                @endif
                                                <br>
                                            <?php $answersx = explode('|',$Onequestion->question->answers);  ?>
                                                الاجابات
                                                @for($k=0;$k<count($answersx);$k++)
                                                @csrf
                                                @if($k ==$Onequestion->question->correct )
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault{{$Onequestion->question->id}}" id="flexRadioDefault{{$Onequestion->question->id}}" value="{{$k}}" checked>
                                                        <input class="form-control col-sm-12 " name="answers{{$Onequestion->question->id.$k}}" value="{{$answersx[$k]}}">
                                                    </div>
                                                @else
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault{{$Onequestion->question->id}}" id="flexRadioDefault{{$Onequestion->question->id}}"  value="{{$k}}">
                                                        <input class="form-control col-sm-12 "  name="answers{{$Onequestion->question->id.$k}}" value="{{$answersx[$k]}}">
                                                    </div>
                                                @endif

                                                @endfor
                                                <br>
                                                <center>
                                                    <a href="{{route('remove.question.exam',['id'=>$Onequestion->question->id])}}" class="btn btn-danger col-sm-4">حذف</a>
                                                </center>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php $i++ ?>
                            @endif


                    @endforeach
                </form>
            </div>
            <div id="tf" class="tab-pane fade">
                <center>
                    <br>
                    <h3>صح أم خطأ</h3>

                    <br>
                </center>
                <?php $i=1 ?>
                <form action="{{route('edit.question.exam',['exam_id'=>$exam_id,'type'=>'tf'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="col-sm-12 btn btn-dark" href="">تعديل الكل</button>
                    @foreach($questions as $Onequestion)
                        @if($Onequestion->question->type == 'tf')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <?php $mcq = "سوال جديد للاختبار سوال جديد للاختبار سوال جديد للاختبار سوال جديد للاختبار سوال جديد للاختبار";?>
                                            <h5 class="card-title"> {{"[ ".$i." ]  "}}
                                                <br><br>
                                                <input class="form-control col-sm-12 " type="text"  name="question{{$Onequestion->question->id}}" value="{{$Onequestion->question->question}}"/>
                                                <br>
                                                <input class=" col-sm-12 " type="file"  name="image{{$Onequestion->question->id}}">

                                            </h5>

                                            @if($Onequestion->question->image != null)

                                                <img src="{{asset('assets/images/questions/'.$Onequestion->question->image )}}" alt="" style="width: 300px;height: 300px">
                                                <br>
                                                هل تريد حذف الصورة؟
                                                <div class="form-check">

                                                    <input class="form-check-input" type="radio" name="removeimage{{$Onequestion->question->id}}" value="0" checked>لا<br>
                                                    <input class="form-check-input" type="radio" name="removeimage{{$Onequestion->question->id}}" value="1" >نعم

                                                </div>

                                            @endif
                                            <br>
                                            <?php $answersx = explode('|',$Onequestion->question->answers);  ?>
                                            الاجابات
                                            @for($k=0;$k<count($answersx);$k++)
                                                @csrf
                                                @if($k ==$Onequestion->question->correct )
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault{{$Onequestion->question->id}}" id="flexRadioDefault{{$Onequestion->question->id}}" value="{{$k}}" checked>
                                                        <input class="form-control col-sm-12 " name="answers{{$Onequestion->question->id.$k}}" value="{{$answersx[$k]}}">
                                                    </div>
                                                @else
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault{{$Onequestion->question->id}}" id="flexRadioDefault{{$Onequestion->question->id}}"  value="{{$k}}">
                                                        <input class="form-control col-sm-12 "  name="answers{{$Onequestion->question->id.$k}}" value="{{$answersx[$k]}}">
                                                    </div>
                                                @endif

                                            @endfor
                                            <br>
                                            <center>
                                                <a href="{{route('remove.question.exam',['id'=>$Onequestion->question->id])}}" class="btn btn-danger col-sm-4">حذف</a>
                                            </center>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php $i++ ?>
                        @endif


                    @endforeach
                </form>
            </div>
            <div id="details" class="tap-pane fade">
                @include('teacher.groups.exams.questions.details')
            </div>
        </div>
    </div>

@endsection
@section("script")
    <script src="{{asset("assets/admin/libs/datatables.net/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js")}}"></script>
    <script src="{{asset("assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js")}}"></script>
    <script src="{{asset("assets/admin/libs/jszip/jszip.min.js")}}"></script>
    <script src="{{asset("assets/admin/libs/pdfmake/build/pdfmake.min.js")}}"></script>
    <script src="{{asset("assets/admin/libs/pdfmake/build/vfs_fonts.js")}}"></script>
    <script src="{{asset("assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js")}}"></script>
    <script src="{{asset("assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js")}}"></script>
    <script src="{{asset("assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.j")}}"></script>
    <script src="{{asset("assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js")}}"></script>
    <script src="{{asset("assets/admin/js/pages/datatables.init.js")}}"></script>
@endsection
