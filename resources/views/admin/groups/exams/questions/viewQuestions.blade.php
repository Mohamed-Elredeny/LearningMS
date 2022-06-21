<h3>اختر من متعدد</h3>
@foreach($questions as $Onequestion)
    <?php $i =1; ?>
    @if($Onequestion->question->type == 'mcq')
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <?php $mcq = "سوال جديد للاختبار سوال جديد للاختبار سوال جديد للاختبار سوال جديد للاختبار سوال جديد للاختبار";?>
                        <h5 class="card-title"> {{"[ ".$i." ] "}} {{$Onequestion->question->question}}</h5><br>
                        @if($Onequestion->question->image != null)
                            <img src="{{asset('assets/images/questions/'.$Onequestion->question->image )}}" alt="" style="width: 300px;height: 300px">
                        @endif
                        <?php $answersx = explode('|',$Onequestion->question->answers);  ?>

                        @for($k=0;$k<count($answersx);$k++)
                            @csrf
                            @if($k ==$Onequestion->question->correct )
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault{{$Onequestion->question->id}}" id="flexRadioDefault{{$Onequestion->question->id}}" value="{{$k}}" checked>
                                    {{$answersx[$k]}}
                                </div>
                            @else
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault{{$Onequestion->question->id}}" id="flexRadioDefault{{$Onequestion->question->id}}"  value="{{$k}}" disabled>
                                    {{$answersx[$k]}}
                                </div>
                            @endif

                        @endfor
                    </div>
                </div>
            </div>

        </div>
    @endif
    <?php $i++; ?>
    <?php $i =1; ?>
@endforeach


<h3>صح ام خطأ</h3>
@foreach($questions as $Onequestion)
    <?php $j =1; ?>
    @if($Onequestion->question->type == 'tf')
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <?php $mcq = "سوال جديد للاختبار سوال جديد للاختبار سوال جديد للاختبار سوال جديد للاختبار سوال جديد للاختبار";?>
                        <h5 class="card-title"> {{"[ ".$j." ] "}} {{$Onequestion->question->question}}</h5><br>
                        @if($Onequestion->question->image != null)
                            <img src="{{asset('assets/images/questions/'.$Onequestion->question->image )}}" alt="" style="width: 300px;height: 300px">
                        @endif
                        <?php $answersx = explode('|',$Onequestion->question->answers);  ?>

                        @for($k=0;$k<count($answersx);$k++)
                            @csrf
                            @if($k ==$Onequestion->question->correct )
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault{{$Onequestion->question->id}}" id="flexRadioDefault{{$Onequestion->question->id}}" value="{{$k}}" checked>
                                    {{$answersx[$k]}}
                                </div>
                            @else
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault{{$Onequestion->question->id}}" id="flexRadioDefault{{$Onequestion->question->id}}"  value="{{$k}}" disabled>
                                    {{$answersx[$k]}}
                                </div>
                            @endif

                        @endfor
                    </div>
                </div>
            </div>

        </div>
    @endif
    <?php $j++; ?>
    <?php $j =1; ?>
@endforeach
