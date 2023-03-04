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
                <span class="brand-name">Admin Dashboard</span>
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
                  @if($rolls->type == 2)
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
                  <li  class="{{ Request::is('post/all')  ? 'active expand' : 'has-sub'}}" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#post"  aria-expanded="false" aria-controls="post">
                      <i class="mdi mdi-book-open-page-variant"></i>
                      <span class="nav-text">Post</span> <b class="caret"></b>
                    </a>
                    <ul  class="{{ Request::is('post/all') ? 'collapse show' : 'collapse'}}"  id="post" data-parent="#sidebar-menu">
                      <div class="sub-menu">
                            <li class="{{ Request::is('post/all') ? 'active' : ''}}">
                              <a class="sidenav-item-link" href="{{url('/post/all')}}">
                                <span class="nav-text">Post</span>
                              </a>
                            </li>
                      </div>
                    </ul>
                  </li>
                  <!-- Admin -->
                  @if($rolls->type == 1)
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
                  <li  class="{{ Request::is('home/about') || Request::is('home/slider')  ? 'active expand' : 'has-sub'}}" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages"
                      aria-expanded="false" aria-controls="pages">
                      <i class="mdi mdi-image-filter-none"></i>
                      <span class="nav-text">Pages</span> <b class="caret"></b>
                    </a>
                    <ul  class="{{ Request::is('home/about') || Request::is('home/slider')  ? 'collapse show' : 'collapse'}}"  id="pages" data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        <li  class="{{ Request::is('home/about') ? 'active' : ''}}" >
                          <a class="sidenav-item-link" href="{{ route('home.about') }}">
                            <span class="nav-text">About</span>
                          </a>
                        </li>
                        <li  class="{{ Request::is('home/slider') ? 'active' : ''}}" >
                          <a class="sidenav-item-link" href="{{ route('home.slider')}}">
                            <span class="nav-text">FAQ</span>
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
                <!-- 
                  <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages"
                      aria-expanded="false" aria-controls="pages">
                      <i class="mdi mdi-image-filter-none"></i>
                      <span class="nav-text">Pages</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="pages"
                      data-parent="#sidebar-menu">
                      <div class="sub-menu">
                        
                        
                          
                            <li >
                              <a class="sidenav-item-link" href="user-profile.html">
                                <span class="nav-text">User Profile</span>
                                
                              </a>
                            </li>
                          
                        

                        
                        
                        <li  class="has-sub" >
                          <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#authentication"
                            aria-expanded="false" aria-controls="authentication">
                            <span class="nav-text">Authentication</span> <b class="caret"></b>
                          </a>
                          <ul  class="collapse"  id="authentication">
                            <div class="sub-menu">
                              
                              <li >
                                <a href="sign-in.html">Sign In</a>
                              </li>
                              
                              <li >
                                <a href="sign-up.html">Sign Up</a>
                              </li>
                              
                            </div>
                          </ul>
                        </li>
                        

                        
                        
                        <li  class="has-sub" >
                          <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#others"
                            aria-expanded="false" aria-controls="others">
                            <span class="nav-text">Others</span> <b class="caret"></b>
                          </a>
                          <ul  class="collapse"  id="others">
                            <div class="sub-menu">
                              
                              <li >
                                <a href="invoice.html">invoice</a>
                              </li>
                              
                              <li >
                                <a href="error.html">Error</a>
                              </li>
                              
                            </div>
                          </ul>
                        </li>
                        

                        
                      </div>
                    </ul>
                  </li>
                -->
                
              </ul>

            </div>
          <!--
            <hr class="separator" />
            
            <div class="sidebar-footer">
              <div class="sidebar-footer-content">
                <h6 class="text-uppercase">
                  Cpu Uses <span class="float-right">40%</span>
                </h6>
                <div class="progress progress-xs">
                  <div
                    class="progress-bar active"
                    style="width: 40%;"
                    role="progressbar"
                  ></div>
                </div>
                <h6 class="text-uppercase">
                  Memory Uses <span class="float-right">65%</span>
                </h6>
                <div class="progress progress-xs">
                  <div
                    class="progress-bar progress-bar-warning"
                    style="width: 65%;"
                    role="progressbar"
                  ></div>
                </div>
              </div>
            </div>
          -->
          </div>
        </aside>
