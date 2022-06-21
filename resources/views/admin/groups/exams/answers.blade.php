@extends("layouts.admin")
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
                      <h5>
                        <a href="{{route('group.details',['id'=>$group_id])}}" class="btn btn-dark">
                            العودة لتفاصيل المجموعة
                        </a>
                    </h5>
                    <br>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead>
                        <tr>
                            <th colspan="9" class="h4 text-center">
                               نتائج الطلاب
                            </th>
                        </tr>
                        <tr>
                            <th>رقم الطالب</th>
                            <th>اسم الطاب</th>
                            <th> رقم الهاتف</th>
                            <th>حالة الطالب</th>
                            <th>الدرجة الكلية</th>
                            <th> عدد الاجابات </th>
                            <th>الاجابات الصحيحة</th>
                            <th>الاجابات الخطأ</th>
                            <th> يوم الاختبار</th>
                            <th> وقت الاختبار</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{$admin->user->id}}</td>
                                <td>{{$admin->user->name}}</td>
                                <td>{{$admin->user->phone}}</td>
                                <td>{{$admin->state}}</td>
                                <td>{{$admin->mark}}</td>
                                <td>{{$admin->answers_num}}</td>
                                <td>{{$admin->right_answers_num}}</td>
                                <td>{{$admin->wrong_answers_num}}</td>
                                <td>{{$admin->day}}</td>
                                <td>{{$admin->time}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>


@endsection

@section("script")
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                     'csv', 'excel', 'print'
                ]
            } );
        } );
    </script>
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
