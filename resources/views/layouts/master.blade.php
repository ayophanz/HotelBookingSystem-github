@include('../includes/header')

  @include('../includes/NavSideBar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="app" >
    @yield('content') 
    {{-- <router-view></router-view> --}}
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
@include('../includes/footer')