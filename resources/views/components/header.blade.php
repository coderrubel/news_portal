<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
        <meta name="description" content="">
        <title>News Portal</title>        
		
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
        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        
    </head>
    <body>
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li class="today-text">Today: {{ date('d-M-Y') }} </li>
                            <li class="email-text">support@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="right">
                            <li class="menu"><a href="{{url('/faq');}}">FAQ</a></li>
                            <li class="menu"><a href="{{url('/about');}}">About</a></li>
                            <li class="menu"><a href="{{url('/contact');}}">Contact</a></li>
                            @if (Auth::check())
                                <li class="menu"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="menu"><a href="{{route('user.logout')}}">Logout</a></li>
                            @else
                            <li class="menu"><a href="{{route('login')}}">Login</a></li>
                            <li class="menu"><a href="{{route('register')}}">Sign Up</a></li>
                            @endif
                            <!-- 
                            <li>
                                <div class="language-switch">
                                    <select name="">
                                        <option value="">Bangla</option>
                                        <option value="">English</option>
                                    </select>
                                </div>
                            </li>
                            -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="heading-area">
            <div class="container">
                <div class="row">
                    @php
                    $logos = DB::table('logos')->orderBy('id','DESC')->first();
                    @endphp
                    @if(!empty($logos->image))
                    <div class="col-md-4 d-flex align-items-center">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <img src="{{asset($logos->image ?? '')}}" alt="{{ $logos->name??''}}">
                            </a>
                        </div>
                    </div>
                    @endif

                    @php
                    $header = DB::table('header_ads')->orderBy('id','DESC')->first();
                    @endphp
                    @if(!empty($header->ads_image))
                    <div class="col-md-8">
                        <div class="ad-section-1">
                            <a href="{{ $header->ads_url ??''}}" target="_blank"><img src="{{ asset($header->ads_image ?? '') }}" alt="{{ $header->ads_name ?? '' }}"></a>
                        </div>
                    </div>
                    @endif
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
                                    @foreach($global_categories as $item)
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{url('/allpost/'.$item->category_name)}}">{{ $item->category_name }}</a>
                                    </li>
                                    @endforeach
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{url('/doctor_list');}}">SPECIALIST DOCTORS LIST</a>
                                    </li>
                                    <!-- 
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Sposrts
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Football</a></li>
                                            <li><a class="dropdown-item" href="#">Cricket</a></li>
                                            <li><a class="dropdown-item" href="#">Baseball</a></li>
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
                                    -->
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>       
