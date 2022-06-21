<header id="header">
    <div class="d-flex flex-column">

        <div class="profile">
            <img src="{{asset('assets/images/users')}}/{{Auth::guard('web')->user()->image}}" alt="" class="img-fluid rounded-circle">
            <h1 class="text-light"><a href="index.html">{{Auth::guard('web')->user()->name}}</a></h1>
            {{-- <div class="social-links mt-3 text-center">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div> --}}
        </div>

        <nav class="nav-menu">
            <ul>
                <li class="active"><a href="{{route('/')}}"><i class="bx bx-home"></i> <span>الرئيسية</span></a></li>
                <li><a href="{{route('/')}}"><i class="bx bx-detail"></i> التفاصيل</a></li>
                <li><a href="{{route('/')}}#groups"><i class="bx bx-server"></i> مجموعاتي</a></li>
                <li><a href="{{route('/')}}#services"><i class="bx bx-book-content"></i> خدماتنا</a></li>
                <li><a href="{{route('/')}}#contact"><i class="bx bx-envelope"></i> تواصل معنا</a></li>
                <li><a href="{{route('site.users.edit')}}"><i class="bx bx-edit"></i>
                 تعديل الملف الشخصي </a></li>
                <li>
                    <a href="">
                        <i>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <input type="submit" value="تسجيل خروج" class="btn btn-danger bx bx-power-off font-size-16 align-middle mr-1">
                            </form>
                        </i>
                    </a>

                </li>
            </ul>
        </nav><!-- .nav-menu -->
        <!--<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>-->

    </div>
</header><!-- End Header -->
