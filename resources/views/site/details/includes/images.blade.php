<div id="images" class="tab-pane fade in ">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8 col-md-10 text-center">
            <div class="mb-3">
                <br>
                <h2>الصور</h2>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row text-center text-lg-left mt-5 mb-5">
            @foreach($group->mediaGroup as $mediaGroup)
            @foreach($mediaGroup->mediaa as $image)
            @if($image->type == "image")
                <div class="col-lg-3 col-md-4 col-6" style="height: 400px !important">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" style="height: 300px !important" src="{{asset('assets/images/Media/'.$image->url)}}" alt="" data-toggle="modal" data-target="#images{{$image->id}}">
                    </a>
                </div>
<div class="modal " id="images{{$image->id}}" tabindex="-1" aria-labelledby="exampleModalLabelimages{{$image->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabelimages{{$image->id}}">الصورة</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="group-img-container text-center post-modal">
                                <img  src="{{asset('assets/images/Media/'.$image->url)}}" alt="" class="group-img img-fluid " style="height: 300px !important" ><br>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endforeach
       
        </div>

    </div>
    <!-- /.container -->
</div>

 
