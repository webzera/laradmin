<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('frontend') }}" class="nav-link">Front Home</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->    
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="fas fa-bell"></i><?php $adminn=\App\Admin::find(1); ?>
        <span style="margin-right:14px;" class="badge badge-warning navbar-badge">{{$adminn->unreadNotifications->count()}}</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">{{$adminn->unreadNotifications->count()}} Notifications</span>
        <div class="dropdown-divider"></div>
        <?php foreach ($adminn->unreadNotifications as $notification) {
        if($notification->type=='App\Notifications\EnquiryNotification') { ?>

          <a href="{{ route('admin.viewnotify', $notification->id) }}" class="dropdown-item">
          <i class="fa fa-envelope mr-2"></i> {{$notification->data['heading']}}-{{$notification->data['name']}}-{{$notification->data['email']}}        
          </a>

        <?php }elseif($notification->type=='App\Notifications\pinrequestNotify') { ?>
        <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
          <i class="fa fa-envelope mr-2"></i>{{$notification->data['heading']}}-{{$notification->data['name']}}-{{$notification->data['email']}}        
          </a>
        
        <?php } } ?>
        <div class="dropdown-divider"></div>
        <a href="{{ route('admin.allnotify')}}" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
    @guest
    @else
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ Auth::user()->name }} <i class="fas fa-sign-out-alt"></i></a>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endguest
    <!-- <li class="nav-item">
      <a class="nav-link" title="logout" href="#"><i class="fa fa-sign-out"></i></a>
    </li> -->
    <!-- <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
          class="fa fa-th-large"></i></a>
    </li> -->
  </ul>
  </nav>