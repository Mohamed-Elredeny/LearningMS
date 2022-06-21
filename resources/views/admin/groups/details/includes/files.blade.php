<div id="files" class="tab-pane fade in ">
    <div class="container">
      
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4>اضافة منشور ملف</h4>
                        <p class="card-title-desc">وصف المنشور
                        </p>

                        <div class="mb-5">
                            <form method="post" action="{{route("groups.testfile")}}" enctype="multipart/form-data"  class="">
                                @csrf
                                <input name="uidfile" id="uidfile" type="hidden" value="{{uniqid()}}">
                                <textarea id="textarea" class="form-control" name="description"  rows="3" ></textarea>
                                <br>
                                <div class="dropzone" id="file-dropzonefile">
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
            @if($file->type == "file")
                <div class="col-lg-3 col-md-4 col-6 text-center">
                        <embed class="" src="{{asset('assets/files/Media/'.$file->url)}}"  frameBorder="0" scrolling="auto" height="300px"/>
                        <a href="{{asset('assets/files/Media/'.$file->url)}}" target="_blank" class="d-block mb-4 h-100">عرض </a>
                </div>
                {{-- <div class="modal fade bd-example-modal-lg" id="images{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="background: rgba(0,0,0,0);border: none">
                        <div class="modal-body" >
                            <div class="group-img-container text-center post-modal">
                                <img  src="{{asset('assets/images/Media')}}/{{$image->url}}" alt="" class="group-img img-fluid " ><br>
                            </div>
                        </div>
                        </div>
                    </div>
                </div> --}}
            @endif
            @endforeach
            @endforeach
       
        </div>

    </div>
    <!-- /.container -->
</div>

 
