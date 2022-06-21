<section id="student_details" class="about">
    <div class="container">

        <div class="section-title">
            <h2>بيانات الطالب</h2>
        </div>

        <div class="row">
            <div class="col-lg-4" data-aos="fade-right">
                <img src="{{asset('assets/images/users')}}/{{Auth::guard('web')->user()->image}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                {{-- <h3>UI/UX Designer &amp; Web Developer.</h3> --}}
                <br>
<!--                <p class="font-italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.
                </p>-->
                <div class="row">
                    <div class="col-lg-12">
                        <ul style="text-align: right !important">
                            <li><i class="icofont-rounded-left"></i> <strong>الاسم:</strong> {{Auth::guard('web')->user()->name}}</li>
                            <li><i class="icofont-rounded-left"></i> <strong>البريد الالكتروني:</strong> {{Auth::guard('web')->user()->email}}</li>
                            <li><i class="icofont-rounded-left"></i> <strong>رقم الهاتف:</strong> {{Auth::guard('web')->user()->phone}}</li>
                            <li><i class="icofont-rounded-left"></i> <strong>المدينة:</strong> {{Auth::guard('web')->user()->city}}</li>
                        </ul>
                    </div>
                    
                </div>
                <br>
                <p>
                    {{Auth::guard('web')->user()->discription}}
                </p>
            </div>
        </div>

    </div>
</section><!-- End About Section -->
