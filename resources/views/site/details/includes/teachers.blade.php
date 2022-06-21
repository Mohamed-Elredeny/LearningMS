<div id="teachers" class="tab-pane fade in ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-10 text-center">
                <div class="mb-3">
                    <br>
                    <h2>هيئة التدريس</h2>
                </div>

            </div>


        </div>

        <table id="datatable1" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

            <thead>
            <tr>
                <th>ID</th>
                <th>الاسم </th>
                <th>البريد الإلكتروني</th>
                <th>كلمة المرور</th>
                <th> رقم الهاتف</th>
                <th>النوع </th>
                <th>الصورة </th>
            </tr>
            </thead>
            <?php $counter =1; ?>
            <tbody>
            @foreach($teachers as $student)
                <tr>
                    <th>{{$student->teacher->id}}</th>
                    <th>{{$student->teacher->name}} </th>
                    <th>{{$student->teacher->email}}</th>
                    <th>{{$student->teacher->real_password}}</th>
                    <th>{{$student->teacher->phone}}</th>
                    <th>{{$student->teacher->gender}} </th>
                    <th>
                        <a class="btn btn-dark col-sm-12" data-toggle="modal" data-target="#course{{$student->teacher->id}}">عرض</a><br>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>


@foreach($teachers as $blogg)
    <div class="modal fade" id="course{{$blogg->teacher->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="courseLabel{{$blogg->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header backgroundColor text-white" style="border:none">
                    <h5 class="modal-title" style="color: black" id="courseLabel{{$blogg->teacher->id}}">الصوره</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body backgroundColorSec p-5">
                    <img  src="{{asset('assets/images/teachers')}}/{{$blogg->teacher->image}}" alt="" class="group-img img-fluid " ><br>
                </div>

            </div>
        </div>
    </div>
@endforeach