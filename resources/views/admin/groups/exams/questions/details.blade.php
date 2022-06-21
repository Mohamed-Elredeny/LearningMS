<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col" colspan="4">
            <center>
                تفاصيل الامتحان
            </center>
        </th>

    </tr>
    </thead>
    <tbody>
    <?php
   // $exam_id
    $quiz = \App\models\AllQuizes::find($exam_id);
    ?>
    <form action="{{route('edit.exam.details',['exam_id'=>$exam_id])}}" method="post" >
        @csrf
        <tr>
            <th scope="row">
                <center>
                    اسم الاختبار
                </center>
            </th>
            <td colspan="3">
                <input class="form-control col-sm-12" type="text" name="name" value="{{$quiz->name}}">
            </td>
        </tr>
        <tr>
            <th scope="row">
                <center>
                    تفاصيل الامتحان
                </center>
            </th>
            <td colspan="3">
                <textarea class="form-control col-sm-12" type="text" name="description">{{$quiz->description}}</textarea>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <center>
                    من تاريخ
                </center>
            </th>
            <td colspan="3">
                <input class="form-control col-sm-12" type="date" name="from"   value="{{date("Y-m-d", strtotime($quiz->from))}}">
            </td>
        </tr>
        <tr>
            <th scope="row">
                <center>
                    الي تاريخ
                </center>
            </th>
            <td colspan="3">
                <input class="form-control col-sm-12" type="date" name="to" value="{{date("Y-m-d", strtotime($quiz->to))}}">
            </td>
        </tr>
        <tr>
            <th scope="row">
                <center>
                    الدرجه الكلية
                </center>
            </th>
            <td colspan="3">
                <input class="form-control col-sm-12" type="number" name="total_score" value="{{$quiz->total_score}}">
            </td>
        </tr>
        <tr>
            <th scope="row">
                <center>
                    وقت الامتحان
                </center>
            </th>
            <td colspan="3">
                <input class="form-control col-sm-12" type="number" name="time_of_quiz" value="{{$quiz->time_of_quiz}}">
            </td>
        </tr>
        <tr>
            <th scope="row">
                <center>
                 عرض الاسئلة
                </center>
            </th>
            <td colspan="3">
                <div class="form-group row">
                    <div class="col-sm-10">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">كل الاسئلة </label>
                            <div class="col-sm-5 row">
                                @if( $quiz->show_all_answers === "1")
                                    <div class="col">
                                        <label for="">نعم</label>
                                        <input type="radio" value="1" id="show_all_answers" name="show_all_answers" data-size="xs" checked>
                                    </div>
                                @else
                                    <div class="col">
                                        <label for="">نعم</label>
                                        <input type="radio" value="1" id="show_all_answers" name="show_all_answers" data-size="xs">
                                    </div>
                                @endif

                                @if( $quiz->show_all_answers === "0")
                                    <div class="col">
                                        <label for="">لا</label>
                                        <input type="radio" value="0" id="show_all_answers" name="show_all_answers" data-size="xs" checked>
                                    </div>
                                @else
                                    <div class="col">
                                        <label for="">لا</label>
                                        <input type="radio" value="0" id="show_all_answers" name="show_all_answers" data-size="xs">
                                    </div>
                                @endif
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> الاسئلة  الخطأ</label>
                            <div class="col-sm-5 row">
                                @if( $quiz->show_wrong_answers === "1")
                                    <div class="col">
                                        <label for="">نعم</label>
                                        <input type="radio" value="1" id="show_wrong_answers" name="show_wrong_answers" data-size="xs" checked>
                                    </div>
                                @else
                                    <div class="col">
                                        <label for="">نعم</label>
                                        <input type="radio" value="1" id="show_wrong_answers" name="show_wrong_answers" data-size="xs">
                                    </div>
                                @endif

                                @if( $quiz->show_wrong_answers === "0")
                                    <div class="col">
                                        <label for="">لا</label>
                                        <input type="radio" value="0" id="show_wrong_answers" name="show_wrong_answers" data-size="xs" checked>
                                    </div>
                                @else
                                    <div class="col">
                                        <label for="">لا</label>
                                        <input type="radio" value="0" id="show_wrong_answers" name="show_wrong_answers" data-size="xs">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> الاسئلة  الصحيحة</label>
                            <div class="col-sm-5 row">
                                @if( $quiz->show_right_answers === "1")
                                    <div class="col">
                                        <label for="">نعم</label>
                                        <input type="radio" value="1" id="show_right_answers" name="show_right_answers" data-size="xs" checked>
                                    </div>
                                @else
                                    <div class="col">
                                        <label for="">نعم</label>
                                        <input type="radio" value="1" id="show_right_answers" name="show_right_answers" data-size="xs">
                                    </div>
                                @endif

                                @if( $quiz->show_right_answers === "0")
                                    <div class="col">
                                        <label for="">لا</label>
                                        <input type="radio" value="0" id="show_right_answers" name="show_right_answers" data-size="xs" checked>
                                    </div>
                                @else
                                    <div class="col">
                                        <label for="">لا</label>
                                        <input type="radio" value="0" id="show_right_answers" name="show_right_answers" data-size="xs">
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

            </td>
        </tr>
        <tr>
            <th scope="row" colspan="4">
                <center>
                    <input class="col-sm-12 btn btn-dark" type="submit"  value="تعديل">
                </center>
            </th>
        </tr>
    </form>
    </tbody>
</table>

