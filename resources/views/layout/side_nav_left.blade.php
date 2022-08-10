
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Payroll Sistem </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrator</a>
        </div>
      </div>
 
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/" class="nav-link {{ request()->is('/') ? 'active': '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/pegawai" class="nav-link {{ request()->is('pegawai') ? 'active': '' }}">
                <i class="nav-icon fas fa-book"></i>
                    <p>
                        Pegawai
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/jabatan" class="nav-link {{ request()->is('jabatan') ? 'active': '' }}">
                <i class="nav-icon fas fa-book"></i>
                    <p>
                        Jabatan
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/tunjangan" class="nav-link {{ request()->is('tunjangan') ? 'active': '' }}">
                <i class="nav-icon fas fa-book"></i>
                    <p>
                        Tunjangan
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/potongan" class="nav-link {{ request()->is('potongan') ? 'active': '' }}">
                <i class="nav-icon fas fa-book"></i>
                    <p>
                        Potongan
                    </p>
                </a>
            </li> 
            <li class="nav-item">
                <a href="/pengguna" class="nav-link {{ request()->is('pengguna') ? 'active': '' }}">
                  <i class="nav-icon fas fa-book"></i>
                    <p>
                        Pengguna
                    </p>
                </a>
            </li> 
            <li class="nav-item">
                <a href="/akun" class="nav-link {{ request()->is('akun') ? 'active': '' }}">
                  <i class="nav-icon fas fa-book"></i>
                    <p>
                        Akun
                    </p>
                </a>
            </li> 
            <li class="nav-item">
                <a href="/rekapabsen" class="nav-link {{ request()->is('rekapabsen') ? 'active': '' }}">
                  <i class="nav-icon fas fa-book"></i>
                    <p>
                        Rekap Absen
                    </p>
                </a>
            </li> 
            <li class="nav-item">
                <a href="/penggajian" class="nav-link {{ request()->is('penggajian') ? 'active': '' }}">
                  <i class="nav-icon fas fa-book"></i>
                    <p>
                        Penggajian
                    </p>
                </a>
            </li> 
            <li class="nav-item">
                <a href="/jurnal" class="nav-link {{ request()->is('jurnal') ? 'active': '' }}">
                  <i class="nav-icon fas fa-book"></i>
                    <p>
                        Jurnal
                    </p>
                </a>
            </li>  
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>