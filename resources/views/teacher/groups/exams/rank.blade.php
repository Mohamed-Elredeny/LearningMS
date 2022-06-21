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
                    <h5>
                        <a href="{{route('teacher.group.details',['id'=>$group_id])}}" class="btn btn-dark">
                            العودة لتفاصيل المجموعة
                        </a>
                    </h5>
                    <br>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center " style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead>
                        <tr>
                            <th colspan="9" class="h4 text-center">
                                تصنيف الطلاب
                            </th>
                        </tr>

                        <tr>
                            <th>رقم الطالب</th>
                            <th>الاسم</th>
                            <th>رقم الجوال</th>
                            <th> الدرجة</th>
                            <th> الترتيب</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $counter = 1 ?>
                        @foreach($admins as $admin)
                            <tr>
                                <th>{{$admin->user->id}}</th>
                                <th>{{$admin->user->name}}</th>
                                <th>{{$admin->user->phone}}</th>
                                <th>{{$admin->mark}}</th>
                                <th>{{$counter}}</th>
                            </tr>
                            <?php $counter++ ?>
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
                        <h5 class="modal-title" style="color: black" id="courseLabel{{$blogg->id}}">الصورة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body backgroundColorSec p-5">
                        <center>
                            <img src="{{asset('assets/images/groups/'.$blogg->image)}}" alt="" style="width:400px;height:300px">
                        </center>
                    </div>

                </div>
            </div>
        </div>
    @endforeach


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
