<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Dashboard</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- Text Editor -->
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  
  <!-- PLUGINS CSS STYLE -->
  <link href="{{ asset('backend/assets/plugins/toaster/toastr.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/flag-icons/css/flag-icon.min.css')}}" rel="stylesheet"/>
  <link href="{{ asset('backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/ladda/ladda.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  
  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="{{ asset('backend/assets/css/sleek.css')}}" />

  

  <!-- FAVICON -->
  <link href="{{ asset('backend/assets/img/favicon.png')}}" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="{{ asset('backend/assets/plugins/nprogress/nprogress.js')}}"></script>
</head>


  <body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">
    @include('admin.sidebar')
      <div class="page-wrapper">
                  <!-- Header -->
          <header class="main-header " id="header">
            <nav class="navbar navbar-static-top navbar-expand-lg">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <!-- search form -->
              <div class="search-form d-none d-lg-inline-block">
                <!--  
                <div class="input-group">
                  <button type="button" name="search" id="search-btn" class="btn btn-flat">
                    <i class="mdi mdi-magnify"></i>
                  </button>
                  <input type="text" name="query" id="search-input" class="form-control" 
                    autofocus autocomplete="off" />
                </div>
                <div id="search-results-container">
                  <ul id="search-results"></ul>
                </div>
                -->
              </div>

              <div class="navbar-right ">
                <ul class="nav navbar-nav">
                  <!-- Github Link Button -->
                  <li class="github-link mr-3">
                    <a class="btn btn-outline-secondary btn-sm" href="{{url('/')}}" target="_blank">
                      <span class="d-none d-md-inline-block mr-2">Live View</span>
                    </a>

                  </li>
                  <!-- Notification -->
                  <!--  
                  <li class="dropdown notifications-menu">
                    <button class="dropdown-toggle" data-toggle="dropdown">
                      <i class="mdi mdi-bell-outline"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li class="dropdown-header">You have 5 notifications</li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-account-plus"></i> New user registered
                          <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-account-remove"></i> User deleted
                          <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 07 AM</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                          <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 12 PM</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-account-supervisor"></i> New client
                          <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-server-network-off"></i> Server overloaded
                          <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 05 AM</span>
                        </a>
                      </li>
                      <li class="dropdown-footer">
                        <a class="text-center" href="#"> View All </a>
                      </li>
                    </ul>
                  </li>
                  -->
                  <!-- User Account -->
                  <li class="dropdown user-menu">
                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                      <img src="{{ asset('backend/assets/img/user/user.png')}}" class="user-image" alt="User Image" />
                      <span class="d-none d-lg-inline-block">{{Auth::user()->name}}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <!-- User image -->
                      <li class="dropdown-header">
                        <img src="{{ asset('backend/assets/img/user/user.png')}}" class="img-circle" alt="User Image" />
                        <div class="d-inline-block">
                        {{Auth::user()->name}} <small class="pt-1"> {{ Auth::user()->email }}</small>
                        </div>
                      </li>
                    <!-- User Setting -->
                      <li>
                        <a href="{{ route('profile.show') }}">
                          <i class="mdi mdi-account"></i> My Profile </a>
                      </li>
                      <li class="dropdown-footer">
                        <a href="{{ route('user.logout')}}"> <i class="mdi mdi-logout"></i> Log Out </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>

            
          </header>


        <div class="content-wrapper">
          <div class="content">						 
                    @yield('admin')
            </div>
        </div>

                  <footer class="footer mt-auto">
            <div class="copyright bg-white">
              <p> &copy; <span id="copy-year">2022</span> Copyright by <a class="text-primary" href="https://github.com/coderrubel/news_portal" target="_blank">CoderRubel</a>. </p>
            </div>
            <script>
                var d = new Date();
                var year = d.getFullYear();
                document.getElementById("copy-year").innerHTML = year;
            </script>
          </footer>

      </div>
    </div>

    
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
<script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/toaster/toastr.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/slimscrollbar/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/charts/Chart.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/ladda/spin.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/ladda/ladda.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-mask-input/jquery.mask.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/daterangepicker/moment.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/jekyll-search.min.js')}}"></script>
<script src="{{ asset('backend/assets/js/sleek.js')}}"></script>
<script src="{{ asset('backend/assets/js/chart.js')}}"></script>
<script src="{{ asset('backend/assets/js/date-range.js')}}"></script>
<script src="{{ asset('backend/assets/js/map.js')}}"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('backend/assets/js/custom.js')}}"></script>
<script>

  function getCategory(){
    var subCategory = $("#sub_category").val();
    $.ajax({
      url : "{{url('get-category')}}",
      type: "get",
      data: {id : subCategory},
      cache : false,
      success :function(data){
        $("#category_id").val(data);
      }
    });
  }
  
  function gEditCategory(){
    var subCategory = $("#sub_category").val();
    $.ajax({
      url : "{{url('get-editcategory')}}",
      type: "get",
      data: {id : subCategory},
      cache : false,
      success :function(data){
        $("#category_id").val(data);
      }
    });
  }
  function getDivis(){
    var divis = $("#divis").val();
    $.ajax({
      url : "{{url('get-distric')}}",
      type: "get",
      data: {divis : divis},
      cache : false,
      success :function(data){
        $("#distri").html(data);
      }
    });
  }
 
  $('#example').DataTable({
    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
  // $('#example').DataTable();

  // post active inactive
  function statusChange(id, value){
    // alert(id);
    // alert(value);
    $.ajax({
      url : "{{url('get-statusChange')}}",
      type: "get",
      data: {id : id, value:value},
      dataType : 'html',
      success :function(data){
        // console.log(data);
          $("#ss"+id).html(data);
      }
    });

  }

    // Doctor active inactive
    function dstatusChange(id, value){
    $.ajax({
      url : "{{url('get-dstatusChange')}}",
      type: "get",
      data: {id : id, value:value},
      dataType : 'html',
      success :function(data){
          $("#dd"+id).html(data);
      }
    });

  }
</script>



  </body>
</html>
