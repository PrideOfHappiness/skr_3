 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboardAdmin" class="brand-link">
      <img src="{{ asset('style/dist/img/honda-logo-motorcycle-brand-png-16.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Tes Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info"> 
          <a href="#" class="d-block">
            @auth
              {{ auth()->user()->nama_karyawan }}
            @endauth
          </a>
        </div>
    </div>

      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2"> 
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">Fungsi-fungsi Sistem</li>
            <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-table"></i>
                    <p>
                      Rekap Penjualan
                    </p>
                  </a>
            </li>
            <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-table"></i>
                    <p>
                      Rekap Pengiriman
                    </p>
                  </a>
            </li>
            <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-table"></i>
                    <p>
                      Rekap Barang
                    </p>
                  </a>
            </li>
            <li class="nav-item"> 
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-chart-simple"></i>
                    <p>
                      Growth Penjualan
                    </p>
                  </a>
            </li>
            <li class="nav-header"> Logout</li>
            <li class="nav-item menu-open"> 
                <a href="{{ route('logout') }}" class="nav-link active">
                  <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <p>
                      Keluar Dari Sistem
                    </p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside >
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->