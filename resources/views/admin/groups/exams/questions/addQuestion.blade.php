<form method="post" action="{{route('groupQuestions.store')}}" enctype="multipart/form-data">
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
            <button type="submit" class="btn btn-dark w-25">Add</button>
        </div>
    </div>
</form>

<script>

    function myFunction() {
        var x = document.getElementById("question_type").value;
        if(x == 'tf'){
           document.getElementById("answers_mcq").style.display = 'none';
            document.getElementById("answers_tf").style.display = 'block';
        }else{
            document.getElementById("answers_mcq").style.display = 'block';
            document.getElementById("answers_tf").style.display = 'none';
        }
    }
</script>
