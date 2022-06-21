@extends("layouts.teacher")
@section("pageTitle", "لوحة التحكم")
@section("style")
    <link href="{{asset("assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css")}}" rel="stylesheet" type="text/css"/>

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
                <h5 class="">الطلاب</h5>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>كلمة المرور</th>
                        <th>رقم الهاتف</th>
                        <th> النوع</th>
                        <th>المجموعات</th>
                        <th> الصوره</th>
                        <th> التحكم</th>

                    </tr>
                    </thead>

                    <tbody>
                        @foreach($admins as $group)
                        @for($i = 0; $i < count($group->group->userGroup); $i++)
                        {{-- @for($y =0; $y < count($group->group->userGroup[$i]->user); $y++) --}}
                        {{-- <tr>{{dd($group->group->userGroup[$i])}} --}}
                            <th>{{$group->group->userGroup[$i]->user->name}}</th>
                            <th>{{$group->group->userGroup[$i]->user->email}}</th>
                            <th>{{$group->group->userGroup[$i]->user->real_password}}</th>
                            <th>{{$group->group->userGroup[$i]->user->phone}}</th>
                            <th>{{$group->group->userGroup[$i]->user->gender}}</th>
                            <th>
                                {{$group->group->name}} <br>
                            </th>
                            <th>
                                <a class="btn btn-dark col-sm-12" data-toggle="modal" data-target="#course{{$group->group->userGroup[$i]->user->id}}">عرض</a><br>
                            </th>
                            <th>
                                <center>
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                التحكم
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                               
                                                <a class="btn btn-dark col-sm-12" href="{{route('teacherUsers.show',['teacherUser'=>$group->group->userGroup[$i]->user->id])}}">عرض</a><br>
                                                <a class="btn btn-dark col-sm-12"  href="{{route('teacherUsers.edit',['teacherUser'=>$group->group->userGroup[$i]->user->id])}}">تعديل</a>
                                                <form method="post" action="{{route('teacherUsers.destroy',['teacherUser'=>$group->group->userGroup[$i]->user->id])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-dark col-sm-12" >حذف</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </th>
                        </tr>
                        <div class="modal fade" id="course{{$group->group->userGroup[$i]->user->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="courseLabel{{$group->group->userGroup[$i]->user->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header backgroundColor text-white" style="border:none">
                                    <h5 class="modal-title" style="color: black" id="courseLabel{{$group->group->userGroup[$i]->user->id}}">الصوره</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body backgroundColorSec p-5">
                                    <img  src="{{asset('assets/images/users')}}/{{$group->group->userGroup[$i]->user->image}}" alt="" class="group-img img-fluid " ><br>
                                </div>

                                </div>
                            </div>
                        </div>
                        {{-- @endfor --}}
                        @endfor
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div>
@foreach($admins as $blogg)
<div class="modal fade" id="course{{$blogg->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="courseLabel{{$blogg->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header backgroundColor text-white" style="border:none">
            <h5 class="modal-title" style="color: black" id="courseLabel{{$blogg->id}}">الصوره</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body backgroundColorSec p-5">
            <img  src="{{asset('assets/images/users')}}/{{$blogg->image}}" alt="" class="group-img img-fluid " ><br>
        </div>

        </div>
    </div>
</div>
@endforeach


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
