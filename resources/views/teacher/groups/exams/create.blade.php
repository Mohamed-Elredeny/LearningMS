@extends("layouts.teacher")
@section("pageTitle", "لوحة التحكم")
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <h5 class="mb-5 mt-3">اضافة اختبار جديد</h5>
                    <form method="post" action="{{route('groupExams.store.type',['type'=>$type])}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="group_id" value="{{$group_id}}">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">اسم الاختبار</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">تفاصيل الاختبار</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="example-text-input" name="description" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الاستاذ</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="teacher" >
                                    @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->teacher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الدرجة الكلية</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" id="example-text-input" name="totalScore" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> مدة الاختبار بالدقائق</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" id="example-text-input" name="duration" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> تاريخ البداية</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" id="example-text-input" name="from" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> تاريخ النهاية</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" id="example-text-input" name="to" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">عرض الاسئلة</label>
                            <div class="col-sm-10">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">كل الاسئلة </label>
                                    <div class="col-sm-5 row">
                                        <div class="col">
                                            <label for="">نعم</label>
                                            <input type="radio" value="1" id="show_all_answers" name="show_all_answers" data-size="xs">
                                        </div>
                                        <div class="col">
                                            <label for="">لا</label>
                                            <input type="radio" value="0" id="show_all_answers" name="show_all_answers" data-size="xs" checked>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> الاسئلة الصحيحة</label>
                                    <div class="col-sm-5 row">
                                        <div class="col">
                                            <label for="">نعم</label>
                                            <input type="radio" value="1" id="show_right_answers" name="show_right_answers" data-size="xs">
                                        </div>
                                        <div class="col">
                                            <label for="">لا</label>
                                            <input type="radio" value="0" id="show_right_answers" name="show_right_answers" data-size="xs" checked>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> الاسئلة الخطأ</label>
                                    <div class="col-sm-5 row">
                                        <div class="col">
                                            <label for="">نعم</label>
                                            <input type="radio" value="1" id="show_wrong_answers" name="show_wrong_answers" data-size="xs">
                                        </div>
                                        <div class="col">
                                            <label for="">لا</label>
                                            <input type="radio" value="0" id="show_wrong_answers" name="show_wrong_answers" data-size="xs" checked>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-dark w-25">اضافة</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


@endsection

@section("script")
    <script src="{{asset("assets/admin/libs/tinymce/tinymce.min.js")}}"></script>
    <script src="{{asset("assets/admin/js/pages/form-editor.init.js")}}"></script>
@endsection
