<div id="students" class="tab-pane fade in ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-10 text-center">
                <div class="mb-3">
                    <br>
                    <h2>طلاب المجموعة</h2>
                </div>
            </div>

        </div>

        <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

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
            @foreach($students as $student)
            <tr>
                <th>{{$student->user->id}} </th>
                <th>{{$student->user->name}}</th>
                <th>{{$student->user->email}} </th>
                <th>{{$student->user->real_password}}</th>
                <th>{{$student->user->phone}}</th>
                <th>{{$student->user->gender}}</th>
                <th>
                    <a class="btn btn-dark col-sm-12" data-toggle="modal" data-target="#course{{$student->user->id}}">عرض</a><br>
                </th>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

@foreach($students as $blogg)
    <div class="modal fade" id="course{{$blogg->user->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="courseLabel{{$blogg->user->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header backgroundColor text-white" style="border:none">
                    <h5 class="modal-title" style="color: black" id="courseLabel{{$blogg->user->id}}">الصوره</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body backgroundColorSec p-5">
                    <img  src="{{asset('assets/images/users')}}/{{$blogg->user->image}}" alt="" class="group-img img-fluid " ><br>
                </div>

            </div>
        </div>
    </div>
@endforeach