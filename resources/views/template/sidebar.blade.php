<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->


      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('img')}}/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->firstname }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      {{-- <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="{{ asset('img')}}/{{ Auth::user()->avatar }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

              <p class="text-muted text-center">Software Engineer</p>


              <a href="{{url('/editprofile')}}" class="btn btn-link btn-block"><b>Edit Profile</b></a>
            </div> --}}

      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        {{-- <li class="header">Main Navigation</li> --}}

        <li>
          <a href="{{url('/insert')}}">
            <i class="fa fa-pencil"></i> <span>Start a Discussion</span>

          </a>
                   
        </li>
        <li>
          <a href="#">
            <i class="fa fa-tags"></i> <span>Tags</span>

          </a>
        </li>  

        <li class="header"></li>

        <li>
          <a href="{{route('thread.index')}}">
            <i class="fa fa-users"></i> <span>All</span>
            {{-- <span class="pull-right-container">
              <small class="label pull-right bg-green">{{ $threads->count() }}</small>
            </span> --}}
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-user"></i> <span>Manager</span>
            {{-- <span class="pull-right-container">
              <span class="label label-primary pull-right">new</span>
            </span> --}}
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-user"></i> <span>Supervisor</span>
            {{-- <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> --}}
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-user"></i> <span>Staff</span>
            {{-- <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> --}}
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>
