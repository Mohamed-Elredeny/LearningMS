<section id="groups" class="about">

    <div class="container">

        <div class="section-title">
            <h2>مجموعاتي</h2>
        </div>
        <div class="row">
            @foreach($groupsId as $group)
                <div class="col-sm-4 card flip-card">
                    <div class="flip-card-inner" >
                        <div class="flip-card-front">
                            <img src="{{asset('assets/images/groups')}}/{{$group->group->image}}" alt="Avatar" style="width:300px;height:90%;">
                        </div>
                        <div class="flip-card-back mdi-format-vertical-align-center">
                            <br><br><br><br>
                            <a class="col-sm-6 btn btn-dark" href="{{route('site.group.details',['id'=>$group->group->id])}}"> دخول</a>
                        </div>
                    </div>
                    <h1 class="text-center">
                        {{$group->group->name}}
                    </h1>
                </div>

            @endforeach

        </div>
    </div>
</section>
