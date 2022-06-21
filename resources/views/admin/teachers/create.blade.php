@extends("layouts.admin")
@section("pageTitle", "لوحة التحكم")
@section('style')
    <link href="{{asset("assets/admin/libs/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css"/>
@endsection
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
                    <h5 class="mb-5 mt-3">اضافة عضو تدريس جديد</h5>

                    <form method="post" action="{{route('teachers.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الاسم</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">البريد الإلكتروني</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" id="example-text-input" name="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الرقم السري</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="example-text-input" name="password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">رقم الجوال </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" id="example-text-input" name="phone" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">النوع</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="gender" required>
                                    <option value="male">ذكر</option>
                                    <option value="female">انثي</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الصورة</label>
                            <div class="custom-file col-sm-10">
                                <input name="image" type="file" class="custom-file-input" id="customFileLangHTML" required>
                                <label class="custom-file-label" for="customFileLangHTML" data-browse="Upload Image"></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2">المجموعات</label>
                            <div class="col-sm-10">
                                <select class="select2 form-control select2-multiple" multiple="multiple" name="groups_id[]" multiple data-placeholder="اختر الإضافات" required>
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
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
<script src="{{asset("assets/admin/libs/select2/js/select2.min.js")}}"></script>

@endsection
