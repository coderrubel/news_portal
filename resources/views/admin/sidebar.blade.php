<aside class="left-sidebar bg-sidebar">
  <div id="sidebar" class="sidebar sidebar-with-footer">
    <!-- Aplication Brand -->
    <div class="app-brand">
      <a href="{{ route('dashboard')}}">
        <svg
          class="brand-icon"
          xmlns="http://www.w3.org/2000/svg"
          preserveAspectRatio="xMidYMid"
          width="30"
          height="33"
          viewBox="0 0 30 33"
        >
          <g fill="none" fill-rule="evenodd">
            <path
              class="logo-fill-blue"
              fill="#7DBCFF"
              d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
            />
            <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
          </g>
        </svg>
        <span class="brand-name">Dashboard</span>
      </a>
    </div>
    <!-- begin sidebar scrollbar -->
    <div class="sidebar-scrollbar">

      <!-- sidebar menu -->
      <ul class="nav sidebar-inner" id="sidebar-menu">
          @php
          $auth = Auth::user()->id;
          $rolls = DB::table('users')->select('users.type','users.id')->where('users.id', $auth)->first();
          @endphp
          <!-- Mentor -->
          @if($rolls->type == 'mentor')
          <!-- Category -->
          <li  class="{{ Request::is('category/all') || Request::is('subcategory/all') ? 'active expand' : 'has-sub'}}" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#charts"  aria-expanded="false" aria-controls="charts">
              <i class="mdi mdi-view-dashboard"></i>
              <span class="nav-text">Category</span> <b class="caret"></b>
            </a>
            <ul  class="{{ Request::is('category/all') || Request::is('subcategory/all') ? 'collapse show' : 'collapse'}}"  id="charts" data-parent="#sidebar-menu">
              <div class="sub-menu">
                    <li class="{{ Request::is('category/all') ? 'active' : ''}}">
                      <a class="sidenav-item-link" href="{{url('/category/all')}}">
                        <span class="nav-text">Catagory</span>
                      </a>
                    </li>
                    <li class="{{ Request::is('subcategory/all') ? 'active' : ''}}">
                      <a class="sidenav-item-link" href="{{url('/subcategory/all')}}">
                        <span class="nav-text">Sub Catagory</span>
                      </a>
                    </li>
              </div>
            </ul>
          </li>
          @endif
          <!-- Post -->
          <li  class="{{ Request::is('post/store') || Request::is('post/all') || Request::is('post/trash')  ? 'active expand' : 'has-sub'}}" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#post"  aria-expanded="false" aria-controls="post">
              <i class="mdi mdi-book-open-page-variant"></i>
              <span class="nav-text">Post</span> <b class="caret"></b>
            </a>
            <ul  class="{{ Request::is('post/store') || Request::is('post/all') || Request::is('post/trash') ? 'collapse show' : 'collapse'}}"  id="post" data-parent="#sidebar-menu">
              <div class="sub-menu">
                <li class="{{ Request::is('post/store') ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{url('/post/store')}}">
                    <span class="nav-text">Add Post</span>
                  </a>
                </li>
                <li class="{{ Request::is('post/all') ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{url('/post/all')}}">
                    <span class="nav-text">All Post</span>
                  </a>
                </li>
                <li class="{{ Request::is('post/trash') ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{url('/post/trash')}}">
                    <span class="nav-text">Trash Posts</span>
                  </a>
                </li>
              </div>
            </ul>
          </li>
          <!-- Admin -->
          @if($rolls->type == 'admin')
          <!-- Category -->
          <li  class="{{ Request::is('category/all') || Request::is('subcategory/all') ? 'active expand' : 'has-sub'}}" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#charts"
              aria-expanded="false" aria-controls="charts">
              <i class="mdi mdi-view-dashboard"></i>
              <span class="nav-text">Category</span> <b class="caret"></b>
            </a>
            <ul  class="{{ Request::is('category/all') || Request::is('subcategory/all') ? 'collapse show' : 'collapse'}}"  id="charts"
              data-parent="#sidebar-menu">
              <div class="sub-menu">
                    <li class="{{ Request::is('category/all') ? 'active' : ''}}">
                      <a class="sidenav-item-link" href="{{url('/category/all')}}">
                        <span class="nav-text">Catagory</span>
                      </a>
                    </li>
                    <li class="{{ Request::is('subcategory/all') ? 'active' : ''}}">
                      <a class="sidenav-item-link" href="{{url('/subcategory/all')}}">
                        <span class="nav-text">Sub Catagory</span>
                      </a>
                    </li>
              </div>
            </ul>
          </li>
          <!-- Pages -->
          <li  class="{{ Request::is('home/about') ? 'active expand' : 'has-sub'}}" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages"
              aria-expanded="false" aria-controls="pages">
              <i class="mdi mdi-image-filter-none"></i>
              <span class="nav-text">Pages</span> <b class="caret"></b>
            </a>
            <ul  class="{{ Request::is('home/about') ? 'collapse show' : 'collapse'}}"  id="pages" data-parent="#sidebar-menu">
              <div class="sub-menu">
                
                <li  class="{{ Request::is('home/about') ? 'active' : ''}}" >
                  <a class="sidenav-item-link" href="{{ route('home.about') }}">
                    <span class="nav-text">About</span>
                  </a>
                </li>
                
                
              </div>
            </ul>
          </li>
          <!-- Doctor -->
          @endif
          <li  class="{{ Request::is('doctor/store') || Request::is('division/all') || Request::is('district/all') || Request::is('specialist/all') || Request::is('doctor/all') || Request::is('home/slider') ? 'active expand' : 'has-sub'}}" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#doctor"  aria-expanded="false" aria-controls="doctor">
              <i class="mdi mdi-doctor"></i>
              <span class="nav-text">Docotr</span> <b class="caret"></b>
            </a>
            <ul  class="{{ Request::is('doctor/store') || Request::is('division/all') || Request::is('district/all') || Request::is('specialist/all') || Request::is('doctor/all') || Request::is('home/slider') ? 'collapse show' : 'collapse'}}"  id="doctor" data-parent="#sidebar-menu">
              <div class="sub-menu">
              @if($rolls->type == 'admin')
                <li class="{{ Request::is('division/all') ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{url('/division/all')}}">
                    <span class="nav-text">Division</span>
                  </a>
                </li>
                <li class="{{ Request::is('district/all') ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{url('/district/all')}}">
                    <span class="nav-text">District</span>
                  </a>
                </li>
                <li class="{{ Request::is('specialist/all') ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{url('/specialist/all')}}">
                    <span class="nav-text">Specialist</span>
                  </a>
                </li>
                @endif
                <li class="{{ Request::is('doctor/store') ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{url('/doctor/store')}}">
                    <span class="nav-text">Add Doctor</span>
                  </a>
                </li>
                @if($rolls->type == 'admin')
                <li class="{{ Request::is('doctor/all') ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{url('/doctor/all')}}">
                    <span class="nav-text">All Doctor</span>
                  </a>
                </li>
                <li  class="{{ Request::is('home/slider') ? 'active' : ''}}" >
                  <a class="sidenav-item-link" href="{{ route('home.slider')}}">
                    <span class="nav-text">Slider</span>
                  </a>
                </li>  
              </div>
            </ul>
          </li>
          <!-- Advertisement -->
          <li  class="{{ Request::is('brand/all') || Request::is('header1/all') || Request::is('header2/all') || Request::is('sidebar1/all') || Request::is('sidebar2/all') ? 'active expand' : 'has-sub'}}" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ads" aria-expanded="false" aria-controls="ads">
              <i class="mdi mdi-view-dashboard-outline"></i>
              <span class="nav-text">Advertisement</span> <b class="caret"></b>
            </a>
            <ul  class="{{ Request::is('brand/all') || Request::is('header1/all') || Request::is('header2/all') || Request::is('sidebar1/all') || Request::is('sidebar2/all') ? 'collapsec sow' : 'collapse'}}"  id="ads" data-parent="#sidebar-menu">
              <div class="sub-menu">
                <li  class="{{ Request::is('header1/all') ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{ route('all.header1')}}">
                    <span class="nav-text">Header Ads 1</span>
                  </a>
                </li>
                <li  class="{{ Request::is('header2/all') ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{ route('all.header2')}}">
                    <span class="nav-text">Header Ads 2</span>
                  </a>
                </li><li  class="{{ Request::is('sidebar1/all') ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{ route('all.sidebar1')}}">
                    <span class="nav-text">Sidebar Ads 1</span>
                  </a>
                </li>
                <li  class="{{ Request::is('sidebar2/all') ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{ route('all.sidebar2')}}">
                    <span class="nav-text">Sidebar Ads 2</span>
                  </a>
                </li>
                <li  class="{{ Request::is('brand/all') ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{ route('all.brand')}}">
                    <span class="nav-text">Footer Ads</span>
                  </a>
                </li>
              </div>
            </ul>
          </li>
            <!-- Conatact page -->
          <li  class="{{ Request::is('admin/contact') || Request::is('admin/message') ? 'active expand' : 'has-sub'}}" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-elements"
              aria-expanded="false" aria-controls="ui-elements">
              <i class="mdi mdi-email-outline"></i>
              <span class="nav-text">Contact</span> <b class="caret"></b>
            </a>
            <ul  class="{{ Request::is('admin/contact') || Request::is('admin/message') ? 'collapse show' : 'collapse'}}"  id="ui-elements"
              data-parent="#sidebar-menu">
              <div class="sub-menu">
                
                <li  class="{{ Request::is('admin/contact') ? 'active' : 'has-sub'}}" >
                  <a class="sidenav-item-link" href="{{ route('admin.contact')}}">
                    <span class="nav-text">Contact Profile</span> 
                  </a>
                </li>
                <li  class="{{ Request::is('admin/message') ? 'active' : 'has-sub'}}" >
                  <a class="sidenav-item-link" href="{{ route('admin.message')}}">
                    <span class="nav-text">Contact Message</span> 
                  </a>
                </li>
              </div>
            </ul>
          </li>
          <!-- Setting -->
          <li  class="{{ Request::is('setting') || Request::is('logo/all') ? 'active expand' : 'has-sub' }}" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
              aria-expanded="false" aria-controls="dashboard">
              <i class="mdi mdi mdi-settings"></i>
              <span class="nav-text">Setting</span> <b class="caret"></b>
            </a>
            <ul  class="{{ Request::is('setting') || Request::is('logo/all') ? 'collapsec sow' : 'collapse'}}"  id="dashboard" data-parent="#sidebar-menu">
              <div class="sub-menu"> 
                <li  class="{{ Request::is('logo/all') ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{ route('all.logo')}}">
                    <span class="nav-text">Logo</span>
                  </a>
                </li>
                <li  class="{{ Request::is('setting') ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{ route('setting')}}">
                    <span class="nav-text">Latest Posts</span>
                  </a>
                </li>
              </div>
            </ul>
          </li>
          <!-- Users -->
          <li  class="{{ Request::is('user/list') ? 'active expand' : 'has-sub' }}" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#user"
              aria-expanded="false" aria-controls="user">
              <i class="mdi mdi-account-multiple"></i>
              <span class="nav-text">Users</span> <b class="caret"></b>
            </a>
            <ul  class="{{ Request::is('user/list') ? 'collapsec sow' : 'collapse'}}"  id="user" data-parent="#sidebar-menu">
              <div class="sub-menu"> 
                <li  class="{{ Request::is('user/list') ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{ route('user.list')}}">
                    <span class="nav-text">All Users</span>
                  </a>
                </li>
              </div>
            </ul>
          </li>
          @endif

  </div>
</aside>
