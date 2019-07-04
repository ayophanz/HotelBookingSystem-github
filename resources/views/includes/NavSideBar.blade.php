  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="{{url('/')}}" class="brand-link"> --}}
    <router-link to="/test" class="brand-link"> 
      <img src="{{asset('/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="font-size: 16px;">{{ config('app.name', 'Laravel') }}</span>
    </router-link> 
    {{-- </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
           <a href="#">Jford Ayop</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link {{Request::is('/')?'active':''}}">
              <i class="fas fa-hotel fa-2x"></i>
              <p>
                &nbsp;&nbsp;Hotel Details
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/room-manager') }}" class="nav-link {{Request::is('room-manager')?'active':''}}">
               <i class="fas fa-door-closed fa-2x"></i>
              <p>
                &nbsp;&nbsp;Room Manager
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/room-type-manager') }}" class="nav-link {{Request::is('room-type-manager')?'active':''}}">
              <i class="fas fa-bed fa-2x"></i>
              <p>
                &nbsp;&nbsp;Room Type Manager
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/price-list-manager') }}" class="nav-link {{Request::is('price-list-manager')?'active':''}}">
              <i class="fas fa-tags fa-2x"></i>
              <p>
                &nbsp;&nbsp;Price List Manager
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/booking-manager') }}" class="nav-link {{Request::is('booking-manager')?'active':''}}">
              <i class="fas fa-address-book fa-2x"></i>
              <p>
                &nbsp;&nbsp;Booking Manager
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>