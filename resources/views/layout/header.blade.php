<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>لوحة التحكم</b></span>

    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->
          {{-- <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">{{auth()->user()->unreadNotifications()->count()}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{auth()->user()->unreadNotifications()->count()}} notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    @foreach (Auth::user()->unreadNotifications->where('type','App\Notifications\MyFirstNotification') as $Notification)
                    <li>
                    <a href="{{route('commentReplay',[ 'id' => $Notification->id])}}">
                      <i class="fa fa-users text-aqua"></i>{{$Notification->data['title']}}
                    </a>
                  </li>
                  @endforeach

                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li> --}}
          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('adminassets/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image"/>
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('adminassets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                <p>
                    {{Auth::user()->name}} - {{Auth::user()->mobile}}
                  <small>{{Auth::user()->email}}</small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  {{-- <a href="{{ url('edit-user-profile/'.Auth::user()->id) }}" class="btn btn-default btn-flat">الملف الشخصي</a> --}}
                </div>
                <div class="pull-right">
                  {{-- <a href="#" class="btn btn-default btn-flat">Sign out</a> --}}
                  <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                   تسجيل خروج
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>

  </header>
