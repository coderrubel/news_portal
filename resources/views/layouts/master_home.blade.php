<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Company Bootstrap Template - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('fontend/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('fontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('fontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('fontend/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('fontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('fontend/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('fontend/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('fontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('fontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('fontend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('fontend/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Company - v2.1.0
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts.body.header')

  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
    @include('layouts.body.slider')
  <!-- End Hero -->

  <main id="main">
    
    @yield('home_content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
    @include('layouts.body.footer')

  <!-- Vendor JS Files -->
  <script src="{{asset('fontend/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('fontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.j')}}s"></script>
  <script src="{{asset('fontend/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('fontend/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('fontend/assets/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
  <script src="{{asset('fontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('fontend/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('fontend/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('fontend/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('fontend/assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('fontend/assets/js/main.js')}}"></script>

</body>

</html>