<div id="record" class="tab-pane fade in ">
    <div class="container">
      
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4>اضافة منشور ملف صوتي</h4>
                        <p class="card-title-desc">وصف المنشور
                        </p>

                        <div class="mb-5">
                            <form method="post" action="{{route("groups.testaudio")}}" enctype="multipart/form-data"  class="">
                                @csrf
                                <input name="uidaudio" id="uidaudio" type="hidden" value="{{uniqid()}}">
                                <textarea id="textarea" class="form-control" name="description"  rows="3" ></textarea>
                                <br>
                                <div class="dropzone" id="file-dropzoneaudio">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="multiple">
                                    </div>
                                </div>
                                
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">أضافة المنشور</button>
                                </div>
                            </form>
                        </div>
                     
                    </div>
                    
                </div>
            </div> <!-- end col -->
        </div>

        <hr class="mt-2 mb-5">

        <div class="row text-center text-lg-left">
            @foreach($group->mediaGroup as $mediaGroupFile)
                @foreach($mediaGroupFile->mediaa as $file)
                    @if($file->type == "audio")
                        <?php 
                            $extention = explode('.', $file->url);
                         ?>
                        <div class="col-lg-3 col-md-4 col-6 text-center">
                            <audio controls autoplay style="width: 100%">
                                <source src="{{asset('assets/audio/Media/'.$file->url)}}" type="audio/{{$extention[1]}}">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    @endif
                @endforeach
            @endforeach
       
        </div>

    </div>
    <!-- /.container -->
</div>

 
