<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Stoebook</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">3</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 3 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{url('assets/dist/img/avatar5.png')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Naufal
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Gimana Kabarnya ?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{url('assets/dist/img/avatar5.png')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Wiwid
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Kapan Kita Meeting ?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{url('assets/dist/img/avatar5.png')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Rohman
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Saya ada projek baru!</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu" id="markasread" onclick="markNotificationAsRead('{{ count(auth()->user()->unreadNotifications) }}')">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">{{ count(auth()->user()->unreadNotifications) }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{ count(auth()->user()->unreadNotifications) }} notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    @forelse(auth()->user()->unreadNotifications as $notification)
                      @include('layouts.partials.notification.'.snake_case(class_basename($notification->type)))
                      @empty
                      <a href="#">Tidak ada notifikasi</a>
                      {{-- <a href="">{{ snake_case(class_basename($notification->type)) }}</a> --}}
                    @endforelse
                  </li>
                  
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('img')}}/{{ Auth::user()->avatar }}{{-- {{ asset('img')}}/{{$threads->user->avatar }} --}}" class="user-image" alt="User Image">
              {{ Auth::user()->firstname }}
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('img')}}/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->firstname }} - {{-- {{ Auth::user()}} --}}
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->


              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('user_profile',auth()->user()) }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                  {{-- <a href="#" class="btn btn-default btn-flat">Sign out</a> --}}
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
