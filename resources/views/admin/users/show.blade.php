@extends("layouts.admin")
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
                    <h5 class="mb-5 mt-3"> بيانات الطالب</h5>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الصورة</label>
                            <div class="col-sm-10">
                                <img  src="{{asset('assets/images/users')}}/{{$admin->image}}" width="150px" height="200px" class="group-img img-fluid " ><br>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الاسم</label>
                            <div class="col-sm-10">
                                {{$admin->name}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">البريد الإلكتروني</label>
                            <div class="col-sm-10">
                                {{$admin->email}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">الرقم السري</label>
                            <div class="col-sm-10">
                                {{$admin->real_password}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">رقم الجوال </label>
                            <div class="col-sm-10">
                                {{$admin->phone}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">النوع</label>
                            <div class="col-sm-10">
                                    @if($admin->gender == "male")
                                    ذكر
                                    @elseif($admin->gender == "female")
                                    انثي
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">المجموعات </label>
                            <div class="col-sm-10">
                                @foreach($admin->groupUser as $groups)
                                    {{$groups->group->name}} <br>
                                @endforeach
                            </div>
                        </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


@endsection

@section("script")
<script src="{{asset("assets/admin/libs/tinymce/tinymce.min.js")}}"></script>
<script src="{{asset("assets/admin/js/pages/form-editor.init.js")}}"></script>
@endsection
