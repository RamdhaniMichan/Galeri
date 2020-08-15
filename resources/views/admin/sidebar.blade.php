<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      @if(Auth::check())
      <li class="nav-item active">
        <a class="nav-link" href="/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      @endif

      @if(Auth::check())
      <li class="nav-item active">
        <a class="nav-link" href="/galeri">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Add Galeri</span></a>
      </li>
      @endif

      @if(Auth::check() && Auth::user()->level == 'admin')
      <li class="nav-item active">
        <a class="nav-link" href="/album">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Add Album</span></a>
      </li>
      @endif

      @if(Auth::check() && Auth::user()->level == 'admin')
      <li class="nav-item active">
        <a class="nav-link" href="/user">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Add User</span></a>
      </li>
      @endif
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      

      <!-- Nav Item - Utilities Collapse Menu -->
     

      <!-- Divider -->
     
      <!-- Heading -->
     

      <!-- Nav Item - Pages Collapse Menu -->

      <!-- Nav Item - Charts -->
      

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="/tables">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>