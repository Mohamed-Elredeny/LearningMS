<div id="record" class="tab-pane fade in ">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8 col-md-10 text-center">
            <div class="mb-3">
                <br>
                <h2>التسجيلات الصوتية</h2>
            </div>
        </div>
    </div>
    <div class="container">
      
        {{-- <hr class="mt-2 mb-5"> --}}

        <div class="row text-center text-lg-left mt-5 mb-5">
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

 
