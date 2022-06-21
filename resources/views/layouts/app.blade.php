<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>iPortfolio Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/site/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/site/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/site/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/vendor/venobox/venobox.css')}}" rel="stylesheet">
    @yield("style")
    <!-- Template Main CSS File -->
    <link href="{{asset('assets/site/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/css/groups.scss')}}" rel="stylesheet">
    <link href="{{asset('assets/site/css/groups.css')}}" rel="stylesheet">
    <!-- Vendor JS Files -->
    <script src="{{asset('assets/site/vendor/jquery/jquery.min.js')}}"></script>

    <!-- =======================================================
    * Template Name: iPortfolio - v1.5.1
    * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Mobile nav toggle button ======= -->
<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

@yield('left_nav')
@yield('home')
<main id="main">
    @yield('student_details')
    @yield('groups')
    @yield('services')
    @yield('about')
    @yield('contact')





</main><!-- End #main -->

<!-- ======= Footer ======= -->
<!--<footer id="footer">-->
<!--    <div class="container">-->
<!--        <div class="copyright">-->
<!--            &copy; Copyright <strong><span>iPortfolio</span></strong>-->
<!--        </div>-->
<!--        <div class="credits">-->
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
<!--            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
<!--        </div>-->
<!--    </div>-->
<!--</footer><!-- End  Footer -->-->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>



<script src="{{asset('assets/site/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/site/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('assets/site/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('assets/site/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/site/vendor/counterup/counterup.min.js')}}"></script>
<script src="{{asset('assets/site/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/site/vendor/venobox/venobox.min.js')}}"></script>
<script src="{{asset('assets/site/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/site/vendor/typed.js/typed.min.js')}}"></script>
<script src="{{asset('assets/site/vendor/aos/aos.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('assets/site/js/main.js')}}"></script>

</body>

</html>