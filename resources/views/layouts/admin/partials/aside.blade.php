<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link">
      <img src="{{ asset('assets/img/logo.png') }}" alt="Test" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PPDB SMK MUH KDH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/img/defaultpp.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->nama }}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active':'' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
                <li class="nav-item menu-open">
                    <a href="" class="nav-link {{ in_array(request()->path(), ['data_priode', 'data_konsentrasi_keahlian','data_asal_sekolah']) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        Database
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/data_priode" class="nav-link {{ request()->is('data_priode') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Periode</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/data_konsentrasi_keahlian" class="nav-link {{ request()->is('data_konsentrasi_keahlian') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Konsentrasi Keahlian</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/data_asal_sekolah" class="nav-link {{ request()->is('data_asal_sekolah') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Asal Sekolah</p>
                        </a>
                    </li>
                    </ul>
                </li>
            <li class="nav-item">
            <a href="/data_pendaftaran" class="nav-link {{ request()->is('data_pendaftaran') ? 'active':'' }}">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Data Pendaftaran
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="/data_ukuran_seragam" class="nav-link {{ request()->is('data_ukuran_seragam') ? 'active':'' }}">
              <i class="nav-icon fa-solid fa-shirt"></i>
              <p>
                Ukuran Seragam
              </p>
            </a>
          </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>