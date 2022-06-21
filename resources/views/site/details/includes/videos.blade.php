<div id="videos" class="tab-pane fade in ">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8 col-md-10 text-center">
            <div class="mb-3">
                <br>
                <h2>الفديوهات</h2>
            </div>
        </div>
    </div>
    <div class="container">
       
        <div class="row text-center text-lg-left mt-5 mb-5">
            @foreach($group->mediaGroup as $mediaGroupVedios)
            @foreach($mediaGroupVedios->mediaa as $video)
            @if($video->type == "video")
                
                
                 <div class="col-lg-3 col-md-3" style="height: 400px !videoimportant">
                            <div class="card mb-4" onclick="modelVideoSingle('{{$video->id}}','{{$video->url}}')" data-toggle="modal" data-target="#imagess{{$video->id}}">
                                
                                    <video width="100%" height="240" >
                                    <source src="{{URL::asset('/assets/videos/Media/')}}/{{$video->url}}" type="video/mp4">
                                </video>
                            </div>
                        </div>

            @endif
            @endforeach
            @endforeach
       
        </div>
        <div id="modelvedio">

</div>

    </div>
    <!-- /.container -->
</div>
<script>

function modelVideoSingle(x,y){
        document.getElementById('modelvedio').innerHTML =`
            <div class="modal " id="imagess`+x+`" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">الفيديو</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="group-img-container text-center post-modal">
                                <video width="100%" height="340" controls>
                                    <source src="{{URL::asset('/assets/videos/Media/')}}/`+y+`" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                        </div>
                    </div>
                </div>
            </div>
        `
    }
    </script>

