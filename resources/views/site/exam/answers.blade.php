@extends('layouts.app')
@section('left_nav')
    @include('site.left_nav')
@endsection
@section('student_details')

<div class="container  mt-3">
    <div class="row">
        <div class="col-sm-12  " style="height:70px">
            <div class="row">
                <div class="col-sm-10">
                    <center>
                        <?php switch($type){
                            case 'wrong':
                                echo '<h1>الاجابات الخطأ</h1>';
                                break;
                            case 'right':
                                echo '<h1>الاجابات الصحيحة</h1>';
                                break;
                        }?>
                    </center>
                </div>
                <div class="col-sm-2">
                    <a href="{{route('student.exam.result',['answer_id'=>$answer_id])}}" class="btn btn-dark" >العودة للنتيجة</a>
                </div>
            </div>

        </div>
        <hr>
        <div class="col-sm-12 mt-2 " style="height:70px;border:2px solid black;border-radius:20px;padding:20px">
            <div class="row">
                <div class="col-sm-12">
                    @if($type == 'right')
                        @foreach($right_answers as $wrong)
                            <?php $Onequestion = \App\models\Questions::find($wrong->id); ?>
                            <h5 class="card-title">  {{$Onequestion->question}}</h5><br>
                            @if($Onequestion->image != null)
                                <img src="{{asset('assets/images/questions/'.$Onequestion->image )}}" alt="" style="width: 300px;height: 300px">
                            @endif
                            <?php $answersx = explode('|',$Onequestion->answers);  ?>

                            @for($k=0;$k<count($answersx);$k++)
                                @csrf
                                @if($k ==$Onequestion->correct )
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault{{$Onequestion->id}}" id="flexRadioDefault{{$Onequestion->id}}" value="{{$k}}" checked>
                                        &#160;&#160;&#160;  {{$answersx[$k]}}
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault{{$Onequestion->id}}" id="flexRadioDefault{{$Onequestion->id}}"  value="{{$k}}" disabled>
                                        &#160;&#160;&#160; {{$answersx[$k]}}
                                    </div>
                                @endif

                            @endfor


                        @endforeach

                    @else
                        @foreach($wrong_answers as $wrong)
                            <?php $Onequestion = \App\models\Questions::find($wrong->id); ?>
                            <h5 class="card-title">  {{$Onequestion->question}}</h5><br>
                            @if($Onequestion->image != null)
                                <img src="{{asset('assets/images/questions/'.$Onequestion->image )}}" alt="" style="width: 300px;height: 300px">
                            @endif
                            <?php $answersx = explode('|',$Onequestion->answers);  ?>

                            @for($k=0;$k<count($answersx);$k++)
                                @csrf
                                @if($k ==$Onequestion->correct )
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault{{$Onequestion->id}}" id="flexRadioDefault{{$Onequestion->id}}" value="{{$k}}" checked>
                                        &#160;&#160;&#160;  {{$answersx[$k]}}
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault{{$Onequestion->id}}" id="flexRadioDefault{{$Onequestion->id}}"  value="{{$k}}" disabled>
                                        &#160;&#160;&#160; {{$answersx[$k]}}
                                    </div>
                                @endif

                            @endfor
                            <div class="form-check col-sm-12 btn bg-danger " style="color:white;font-weight: bolder">
                                @if($wrong->answer == null)
                                    {{'لم يتم الاجابة عن ذلك السوال'}}
                                @else
                                    {{$wrong->answer}}

                                @endif

                            </div>

                        @endforeach
                    @endif
                </div>
                <br>
            </div>

        </div>
    </div>
</div>
@endsection
