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
          <a href="/profil" class="d-block">{{ Auth::user()->nama }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ $judul === "Dashboard" ? 'active':'' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @can('isadmin')
            <li class="nav-item">
            <a href="/data_ppdb" class="nav-link {{ $judul === "Data PPDB" ? 'active':'' }}">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Data PPDB
              </p>
            </a>
          </li>
          @endcan
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>