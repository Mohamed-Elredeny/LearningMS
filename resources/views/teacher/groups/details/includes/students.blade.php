<div id="students" class="tab-pane fade in ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-10 text-center">
                <div class="mb-3">
                    <br>
                    <h2>طلاب المجموعة</h2>
                </div>
                <div class="mb-3">
                    <a type="button" class="btn btn-dark" href="{{route("teacherUsers.create")}}"  target="_blank">أضافة طالب جديد</a>
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
            </tr>
            </thead>
            <?php $counter =1; ?>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <th>{{$student->user->id}}</th>
                    <th>{{$student->user->name}} </th>
                    <th>{{$student->user->email}}</th>
                    <th>{{$student->user->real_password}}</th>
                    <th>{{$student->user->gender}}</th>
                    <th>{{$student->user->id}} </th>

                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
