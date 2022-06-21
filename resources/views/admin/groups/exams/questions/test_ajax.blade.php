<?php
$exam_id =1;
?>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>Grocery Store</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="container">
    <form id="myform"  enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="exam_id" value="{{$exam_id}}">
        <div class="form-group row">
            <label for="example-text-input" class="col-sm-2 col-form-label">نوع السوال</label>
            <div class="col-sm-10">
                <select class="form-control" type="text" id="question_type" name="type" onchange="myFunction()">
                    <option value="mcq">اختيار من متعدد</option>
                    <option value="tf">صح أم خطأ</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-sm-2 col-form-label">راس السوال</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id="example-text-input" name="body">
            </div>
        </div>
        <div id="answers_mcq">
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">الاجابة الاولي</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" id="example-text-input" name="mcq1">
                </div>
                <div class="col-sm-1">
                    <input class="form-control" type="radio" id="example-text-input" value="1" name="mcq" checked>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">الاجابة الثانية</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" id="example-text-input" name="mcq2">
                </div>
                <div class="col-sm-1">
                    <input class="form-control" type="radio" id="example-text-input" value="2" name="mcq">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">الاجابة الثالثة</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" id="example-text-input" name="mcq3">
                </div>
                <div class="col-sm-1">
                    <input class="form-control" type="radio" id="example-text-input" value="3" name="mcq">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">الاجابة الرابعة</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" id="example-text-input" name="mcq4">
                </div>
                <div class="col-sm-1">
                    <input class="form-control" type="radio" id="example-text-input" value="4" name="mcq">
                </div>
            </div>
        </div>
        <div id="answers_tf" style="display: none">
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">الاجابة الاولي</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" id="example-text-input" name="tf1">
                </div>
                <div class="col-sm-1">
                    <input class="form-control" type="radio" id="example-text-input" value="1" name="tf" checked>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">الاجابة الثانية</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" id="example-text-input" name="tf2">
                </div>
                <div class="col-sm-1">
                    <input class="form-control" type="radio" id="example-text-input" value="2" name="tf">
                </div>
            </div>
        </div>



        <div class="form-group row">
            <label for="example-text-input" class="col-sm-2 col-form-label">الصورة</label>
            <div class="custom-file col-sm-10">
                <input name="image" type="file" class="custom-file-input" id="customFileLangHTML" >
                <label class="custom-file-label" for="customFileLangHTML" data-browse="Upload Image"></label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 text-center">
                <button  class="btn btn-dark w-25">Add</button>
            </div>
        </div>
    </form>

</div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
</script>
<script>
    jQuery(document).ready(function(){
        jQuery('#ajaxSubmit').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ route('groupQuestions.store') }}",
                method: 'post',
                data: {
                    type: jQuery('#type').val(),
                    body: jQuery('#body').val(),
                    mcq1: jQuery('#mcq1').val(),
                    mcq2: jQuery('#mcq2').val(),
                    mcq3: jQuery('#mcq3').val(),
                    mcq4: jQuery('#mcq4').val(),
                    mcq: jQuery('#mcq').val(),
                    image: jQuery('#image').val(),

                },
                success: function(result){
                    console.log(result);
                }});
        });
    });
</script>
</body>
</html>
