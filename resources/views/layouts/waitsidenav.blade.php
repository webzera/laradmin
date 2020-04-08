@section('styles')
<style>
</style>
@endsection

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
      <img src="{{ asset('images/logo.jpg') }}" alt="St. Thomas" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">School</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
          <a href="{{ route('admin.home') }}" class="d-block">Admin Control Panel</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php
                $routeArray = app('request')->route()->getAction();
                $controllerAction = class_basename($routeArray['controller']);
                list($controller, $action) = explode('@', $controllerAction);
                ?>
          <li class="nav-item has-treeview menu-open">

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('noticeboard.index') }}" class="nav-link <?php if($controller=='NoticeboardController') echo 'active' ?>">
                  <i class="fa fa-laptop nav-icon"></i>
                  <p>Notice Board</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('dairydate.index') }}" class="nav-link <?php if($controller=='DairydateController') echo 'active' ?>">
                  <i class="fa fa-laptop nav-icon"></i>
                  <p>Dairy Dates</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('page.index') }}" class="nav-link <?php if($controller=='PageController') echo 'active' ?>">
                  <i class="fa fa-laptop nav-icon"></i>
                  <p>Pages</p>
                </a>
              </li>
            
              <li class="nav-item">
                <a href="{{ route('admin.allnotify') }}" class="nav-link <?php if($controller=='NotificationController') echo 'active' ?>">
                  <i class="fa fa-magic nav-icon"></i>
                  <p>Enquiry</p>
                </a>
              </li>
               <li class="nav-item">
                    <a href="{{ route('student.index') }}" class="nav-link <?php if($controller=='StudentController') echo 'active' ?>">
                    <i class="fa fa-magic nav-icon"></i>
                    <p>Admin Student List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.staffstudentview.newreguser') }}" class="nav-link <?php if($controller=='StaffstudentviewController' && $action == 'newreguser') echo 'active' ?>">
                    <i class="fa fa-magic nav-icon"></i>
                    <p>New Register Student</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.staffstudentview.index') }}" class="nav-link <?php if($controller=='StaffstudentviewController' && $action == 'index') echo 'active' ?>">
                    <i class="fa fa-magic nav-icon"></i>
                    <p>Staff Student List</p>
                    </a>
                  </li>        
                  <li class="nav-item">
                    <a href="{{ route('staff.index') }}" class="nav-link <?php if($controller=='StaffController') echo 'active' ?>">
                    <i class="fa fa-magic nav-icon"></i>
                    <p>Staff List</p>
                    </a>
                  </li>

              
              <li class="nav-item">
                    <a href="{{ route('adminuser.index') }}" class="nav-link <?php if($controller=='AdminuserController') echo 'active' ?>">
                    <i class="fa fa-magic nav-icon"></i>
                    <p>Admin User List</p>
                    </a>
                  </li>
              <li class="nav-item">
                    <a href="{{ route('admin.adminrolelist') }}" class="nav-link <?php if($controller=='RoleController' && $action == 'adminrolelist') echo 'active' ?>">
                    <i class="fa fa-magic nav-icon"></i>
                    <p>Admin User Role</p>
                    </a>
                  </li>
              <li class="nav-item">
                    <a href="{{ route('admin.adminpermissionlist') }}" class="nav-link <?php if($controller=='PermissionController' && $action == 'adminpermissionlist') echo 'active' ?>">
                    <i class="fa fa-magic nav-icon"></i>
                    <p>Admin User Permission</p>
                    </a>
                  </li>
                  <li class="nav-item">
                <a href="{{ route('album.index') }}" class="nav-link <?php if($controller=='AlbumController') echo 'active' ?>">
                  <i class="fa fa-id-badge nav-icon"></i>
                  <p>Gallery</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="{{ route('admin.markenterdate.index') }}" class="nav-link <?php if($controller=='AdminController' && $action == 'markenterdatelist') echo 'active' ?>">
                  <i class="fa fa-id-badge nav-icon"></i>
                  <p>Mark Enter Date</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.acayearterm.index') }}" class="nav-link <?php if($controller=='AdminController' && $action == 'acayeartermlist') echo 'active' ?>">
                  <i class="fa fa-id-badge nav-icon"></i>
                  <p>Set Term Year</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('slider.index') }}" class="nav-link <?php if($controller=='SliderController') echo 'active' ?>">
                  <i class="fa fa-laptop nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>

              <li class="nav-item">              
                <a class="dropdown-item nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa fa-power-off nav-icon"></i><p>Logout</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
              </li>
              

            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

@section('script')
<script>
</script>
@endsection
