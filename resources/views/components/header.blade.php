<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
        <meta name="description" content="">
        <title>News Portal Website</title>        
		
        <link rel="icon" type="image/png" href="{{asset ('fontend/uploads/favicon.png')}}">

        <!-- All CSS -->
        <link rel="stylesheet" href="{{ asset('fontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('fontend/css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{ asset('fontend/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{ asset('fontend/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{ asset('fontend/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{ asset('fontend/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{ asset('fontend/css/select2-bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('fontend/css/sweetalert2.min.css')}}">
        <link rel="stylesheet" href="{{ asset('fontend/css/spacing.css')}}">
        <link rel="stylesheet" href="{{ asset('fontend/css/font_awesome_5_free.min.css')}}">
        <link rel="stylesheet" href="{{ asset('fontend/css/style.css')}}">
        
        <!-- All Javascripts -->
        <script src="{{asset ('fontend/js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset ('fontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset ('fontend/js/jquery-ui.js')}}"></script>
        <script src="{{asset ('fontend/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset ('fontend/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset ('fontend/js/wow.min.js')}}"></script>
        <script src="{{asset ('fontend/js/select2.full.js')}}"></script>
        <script src="{{asset ('fontend/js/sweetalert2.min.js')}}"></script>
        <script src="{{asset ('fontend/js/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset ('fontend/js/acmeticker.js')}}"></script>

        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>        
        
        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84213520-6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-84213520-6');
        </script>

    </head>
    <body>
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li class="today-text">Today: {{ date('d-M-Y') }} </li>
                            <li class="email-text">contact@arefindev.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="right">
                            <li class="menu"><a href="faq.html">FAQ</a></li>
                            <li class="menu"><a href="about.html">About</a></li>
                            <li class="menu"><a href="{{url('/contact');}}">Contact</a></li>
                            <li class="menu"><a href="login.html">Login</a></li>
                            <li>
                                <div class="language-switch">
                                    <select name="">
                                        <option value="">English</option>
                                        <option value="">Hindi</option>
                                        <option value="">Arabic</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="heading-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 d-flex align-items-center">
                        <div class="logo">
                            <a href="index.html">
                                <img src="uploads/logo.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="ad-section-1">
                            <a href=""><img src="uploads/ad-1.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="website-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{url('/');}}">Home</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Sports
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Football</a></li>
                                            <li><a class="dropdown-item" href="#">Cricket</a></li>
                                            <li><a class="dropdown-item" href="#">Baseball</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        National
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Dhaka</a></li>
                                            <li><a class="dropdown-item" href="#">Khulna</a></li>
                                            <li><a class="dropdown-item" href="#">Sylhet</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Lifestyle
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Insurance</a></li>
                                            <li><a class="dropdown-item" href="#">Working from Home</a></li>
                                            <li><a class="dropdown-item" href="#">Habits</a></li>
                                            <li><a class="dropdown-item" href="#">Entrepreneur</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Technology
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Computer</a></li>
                                            <li><a class="dropdown-item" href="#">Mobile</a></li>
                                            <li><a class="dropdown-item" href="#">Programming</a></li>
                                            <li><a class="dropdown-item" href="#">Freelancing</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Job List
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Government</a></li>
                                            <li><a class="dropdown-item" href="#">Non Government</a></li>
                                            <li><a class="dropdown-item" href="#">Corporate</a></li>
                                            <li><a class="dropdown-item" href="#">Accounting</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Health
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Parenting</a></li>
                                            <li><a class="dropdown-item" href="#">Diseases</a></li>
                                            <li><a class="dropdown-item" href="#">Diet</a></li>
                                            <li><a class="dropdown-item" href="#">Weight Loss</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Travel
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Adventures</a></li>
                                            <li><a class="dropdown-item" href="#">Explore</a></li>
                                            <li><a class="dropdown-item" href="#">Postcards</a></li>
                                            <li><a class="dropdown-item" href="#">Taste</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Gallery
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="photo-gallery.html">Photo Gallery</a></li>
                                            <li><a class="dropdown-item" href="video-gallery.html">Video Gallery</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>       
