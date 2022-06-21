<style>
    .logoutButton{
        display: flex;
        align-items: center;
        color: #a8a9b4;
        padding: 12px 15px;
        margin-bottom: 8px;
        transition: 0.3s;
        font-size: 15px;
        background-color: transparent;
        border:0px

    }
</style>
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
                <li><a href="#student_details"><i class="bx bx-detail"></i> التفاصيل</a></li>
                <li><a href="#groups"><i class="bx bx-server"></i> مجموعاتي</a></li>
                <li><a href="#services"><i class="bx bx-book-content"></i> خدماتنا</a></li>
                <li><a href="#contact"><i class="bx bx-envelope"></i> تواصل معنا</a></li>
                <li><a href="{{route('site.users.edit')}}"><i class="bx bx-edit"></i>
                 تعديل الملف الشخصي </a></li>
            </ul>
            <form action="{{route('logout')}}" method="post" >
                @csrf
                <input type="submit" value="تسجيل خروج" class="mr-3 logoutButton" >
            </form>

        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->
