
<div id="home" class="tab-pane active">
    <br>
<h4 class="text-center h3">
    اخر الاحداث
</h4>
{{-- </div> --}}
<?php $x = count($group->mediaGroup) -1; ?>
@for($i = $x; $i >= 0 ; $i--)
@if($group->mediaGroup[$i]->is_publisher == 1)
    <div class="card mt-4">
        <div class="card-body"> 
            @if($group->mediaGroup[$i]->publisher_type == 'admin')
                <div class="d-flex justify-content-between">
                    <div class="media mb-5">
                        <img class="d-flex mr-3 rounded-circle avatar-sm" src='{{asset("assets/images/admins")}}/{{$group->mediaGroup[$i]->groupsAdmin->image}}' alt="Generic placeholder image">
                        <div class="media-body">
                            <h4 class="font-size-14 m-0">{{$group->mediaGroup[$i]->groupsAdmin->name}}</h4>
                            <small class="text-muted">{{$group->mediaGroup[$i]->groupsAdmin->email}}</small>
                            <br>
                            <small class="text-muted">
                                {{$group->mediaGroup[$i]->created_at}}
                            </small>
                        </div>
                    </div>
                </div>
            @elseif($group->mediaGroup[$i]->publisher_type == 'teacher')
            <div class="d-flex justify-content-between">
                <div class="media mb-5">
                    <img class="d-flex mr-3 rounded-circle avatar-sm" src='{{asset("assets/images/teachers")}}/{{$group->mediaGroup[$i]->groupsTeacher->teacher->image}}' alt="Generic placeholder image">
                    <div class="media-body">
                        <h4 class="font-size-14 m-0">{{$group->mediaGroup[$i]->groupsTeacher->teacher->name}}</h4>
                        <small class="text-muted">{{$group->mediaGroup[$i]->groupsTeacher->teacher->email}}</small>
                        <br>
                        <small class="text-muted">
                            {{$group->mediaGroup[$i]->created_at}}
                        </small>
                    </div>
                </div>
            </div>
            @endif
        
            <p>{{$group->mediaGroup[$i]->description}}</p>
            <hr/>
    
            <div class="row">
                @foreach($group->mediaGroup[$i]->mediaa as $media)
                    @if($media->type == "image")
                        <div class="col-lg-3 col-md-4">
                            <div class="card mb-4">
                                <img class="card-img-top img-fluid" onclick="modelImage('{{$media->id}}','{{$media->url}}')" style="height: 280px !important" src='{{asset('assets/images/Media/'.$media->url)}}' alt=""  data-toggle="modal" data-target="#images{{$media->id}}">
                            </div>
                        </div>
                        
                    @elseif($media->type == "video")
                        <div class="col-lg-4 col-md-4">
                            <div class="card mb-4">
                                <video width="100%" style="height: 280px !important" onclick="modelVideo('{{$media->id}}','{{$media->url}}')" data-toggle="modal" data-target="#images{{$media->id}}">
                                    <source src="{{URL::asset("/assets/videos/Media")}}/{{$media->url}}" type="video/mp4">
                                </video>
                            </div>
                        </div>

                    @elseif($media->type == "audio")
                        <?php 
                            $extention = explode('.', $media->url);
                         ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="card mb-4">
                                <audio width="100%" controls autoplay>
                                    <source src="{{asset('assets/audio/Media/'.$media->url)}}" type="audio/{{$extention[1]}}">
                                </audio>
                            </div>
                        </div>

                    @elseif($media->type == "file")
                        <div class="col-lg-4 col-md-4">
                            <div class="card mb-4">
                                <embed class="" src="{{asset('assets/files/Media/'.$media->url)}}"  frameBorder="0" scrolling="auto" height="280px"/>
                                <div class="py-2 text-center">
                                    <a href="{{asset('assets/files/Media/'.$media->url)}}" target="_blank" class="text-muted font-600">عرض </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif
@endfor

<div id="modelImagee">

</div>
<script>
    function modelImage(x,y){
        document.getElementById('modelImagee').innerHTML =`
            <div class="modal " id="images`+x+`" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">الصورة</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="group-img-container text-center post-modal">
                                <img  src="{{asset('assets/images/Media')}}/`+y+`" alt="" class="group-img img-fluid " ><br>
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

    function modelVideo(x,y){
        document.getElementById('modelImagee').innerHTML =`
            <div class="modal " id="images`+x+`" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    function modelِAudio(x,y){
        document.getElementById('modelImagee').innerHTML =`
            <div class="modal " id="images`+x+`" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <source src="{{asset('assets/audio/Media/')}}/`+y+`">
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

    function modelShare(x){
        document.getElementById('modelImagee').innerHTML =`
            <div class="modal " id="share`+x+`" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">مشاركة المنشور</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('groups.shareToGroup')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input value="`+x+`" name="postId" type="hidden" >
                                    <label class="control-label col-sm-2">المجموعات</label>
                                    <div class="col-sm-10">
                                        <select class="select2 form-control select2-multiple" multiple="multiple" name="groups_id[]" multiple data-placeholder="اختر الإضافات">
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                                <button type="submint" class="btn btn-primary">مشاركة</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        `
    }
</script>

</div>

