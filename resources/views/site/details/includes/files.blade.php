<div id="files" class="tab-pane fade in ">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8 col-md-10 text-center">
            <div class="mb-3">
                <br>
                <h2>الملفات</h2>
            </div>
        </div>
    </div>
    <div class="container">

        {{-- <hr class="mt-2 mb-5"> --}}

        <div class="row text-center text-lg-left mt-5 mb-5">
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

 
