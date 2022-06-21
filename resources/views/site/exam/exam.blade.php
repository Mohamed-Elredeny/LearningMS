<link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/exam.css')}}">

<div class="container h4 ">
    <div class="row header" >
        <div class="col-sm-4 text-center ">
            عدد الاسئلة {{count($questions)}} <br>
            الوقت{{' '.$exam->time_of_quiz}} دقيقة

        </div>

        <div class="col-sm-4 text-center">
             {{$exam->name}} <br>
            <p id="demo"></p>
        </div>
        <div class="col-sm-4 text-center">
            الدرجة الكلية  {{$exam->total_score}} <br>
            درجة السوال  {{round($exam->total_score / count($questions),1 )}}
        </div>

    </div>
    <div class="row body" style="direction:rtl;text-align:right">
        <form action="{{route('student.solve.exam')}}" method="post"  id="myform" class="col-sm-12">
            @csrf
            <input type="hidden" name="exam_id" value="{{$exam_id}}">
            <input type="hidden" name="one_question_score" value="{{round($exam->total_score / count($questions),1 )}}">
            <?php $j=0 ;?>
            @foreach($questions as $Onequestion)
                <div class="col-sm-12 mt-1">
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
                                        <input class="form-check-input" type="radio" name="answer{{$Onequestion->question->id}}" id="flexRadioDefault{{$Onequestion->question->id}}" value="{{$Onequestion->question->id}}" >
                                        &#160;  &#160;
                                        <label for="form-check-input">{{$answersx[$k]}}</label>
                                    </div>

                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer{{$Onequestion->question->id}}" id="flexRadioDefault{{$Onequestion->question->id}}"  value="{{$Onequestion->question->id}}" >
                                        &#160;  &#160;
                                        <label for="form-check-input">{{$answersx[$k]}}</label>
                                    </div>
                                @endif

                            @endfor
                        </div>
                    </div>
                    <hr>
                </div>
                <?php $j++ ?>
            @endforeach
            <center>
                <button class="btn btn-dark" type="submit">الحصول علي النتيجة</button>

            </center>
        </form>

    </div>
    <div class="row footer h6">
        <div class="col-sm-12 text-center">
            نتمني لطلابنا الاعزاء كل التوفيق والنجاح أ / {{ $exam->groups_teacher_id }}
        </div>

    </div>
</div>

    <script>
        Date.prototype.addMinutes= function(m){
            this.setMinutes(this.getMinutes()+m);
            return this;
        }

        // Set the date we're counting down to
        var countDownDate = new Date().addMinutes({{$exam->time_of_quiz}}).getTime();
        // Update the count down every 1 second
        var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

            // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML =  hours + "h "
        + minutes + "m " + seconds + "s ";

        // If the count down is over, write some text
        if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
        document.getElementById("myform").submit();
        }
    }, 1000);
</script>


