@extends('layouts.app')
@section('left_nav')
    @include('site.left_nav')
@endsection

@section('student_details')
<div class="row" style="width: 90%; margin:auto;">
    <div class="col-12">
        <div class="card" style="border:none">
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
                <h5 class="mb-5 mt-3">تعديل بيانات الطالب</h5>

                <form method="post" action="{{route('site.users.update',['id' => Auth::guard('web')->user()->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الاسم</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="name" value="{{Auth::guard('web')->user()->name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">البريد الإلكتروني</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" id="example-text-input" name="email" value="{{Auth::guard('web')->user()->email}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الرقم السري</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="password" value="{{Auth::guard('web')->user()->real_password}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">رقم الجوال </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="example-text-input" name="phone" value="{{Auth::guard('web')->user()->phone}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">النوع</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="gender" required>
                                @if(Auth::guard('web')->user()->gender == "male")
                                <option value="male" selected>ذكر</option>
                                <option value="female">انثي</option>
                                @elseif(Auth::guard('web')->user()->gender == "female")
                                <option value="male">ذكر</option>
                                <option value="female" selected>انثي</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">المدينة</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="city" value="{{Auth::guard('web')->user()->city}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">نبذة عني</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" type="text" id="example-text-input" name="discription">{{Auth::guard('web')->user()->discription}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الصورة</label>
                        <div class="custom-file col-sm-10">
                            <input name="image" type="file" class="custom-file-input" id="customFileLangHTML">
                            <label class="custom-file-label" for="customFileLangHTML" data-browse="Upload Image"></label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-dark w-25">تعديل</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection