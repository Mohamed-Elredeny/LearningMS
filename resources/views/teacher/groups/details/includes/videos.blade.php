<div id="videos" class="tab-pane fade in ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4>اضافة منشور فيديو</h4>
                        <p class="card-title-desc">وصف المنشور
                        </p>

                        <div class="mb-5">
                            <form method="post" action="{{route("groups.testvid")}}" enctype="multipart/form-data"  class="">
                                @csrf
                                <input name="uidvid" id="uidvid" type="hidden" value="{{uniqid()}}">
                                <textarea id="textarea" class="form-control" name="description"  rows="3" ></textarea>
                                <br>
                                <div class="dropzone" id="file-dropzone8">
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
            </div>
        </div>

        <hr class="mt-2 mb-5">
        <div class="row text-center text-lg-left">
            @foreach($group->mediaGroup as $mediaGroupVedios)
            @foreach($mediaGroupVedios->mediaa as $video)
            @if($video->type == "video")
                <div class="col-lg-3 col-md-4 col-6" style="height: 400px !videoimportant">
                    <div class="embed-responsive embed-responsive-21by9">
                        {{-- <video src="{{asset('assets/vedios/Media/'.$video->url)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" controls></video> --}}
                    
                        <video width="320" height="240" controls>
                        <source src="{{URL::asset("/assets/vedios/Media/$video->url")}}" type="video/mp4">
                      </video>
                    </div>
                </div>
                {{-- <div class="modal fade bd-example-modal-lg" id="videos{{$video->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="background: rgba(0,0,0,0);border: none">
                        <div class="modal-body" >
                            <div class="group-img-container text-center post-modal">
                                <img  src="{{asset('assets/videos/Media')}}/{{$video->url}}" alt="" class="group-img img-fluid " ><br>
                            </div>
                        </div>
                        </div>
                    </div>
                </div> --}}
            @endif
            @endforeach
            @endforeach
       
        </div>
        {{-- <div class="row text-center text-lg-left">

            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <div class="embed-responsive embed-responsive-21by9" style="height:200px">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/fETCWuXhR7Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </a>
            </div>
        </div> --}}

    </div>
    <!-- /.container -->
</div>
