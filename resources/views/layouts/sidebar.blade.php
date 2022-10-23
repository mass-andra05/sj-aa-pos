<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @if (Request::segment(1) == '')
        <li class="nav-item active">
        <a class="nav-link active" href="/">
    @else
        <li class="nav-item">
        <a class="nav-link" href="/">
    @endif
            <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        SYSTEM
    </div>

    @if (auth()->user()->level =="admin")
    
    @if (Request::segment(1) == 'user')
        <li class="nav-item active">
        <a class="nav-link active" href="/user">
    @else
        <li class="nav-item">
        <a class="nav-link" href="/user">
    @endif
            <i class="fas fa-users"></i>
        <span>User</span></a>
    </li>

    @if (Request::segment(1) == 'setting')
        <li class="nav-item active">
        <a class="nav-link active" href="/setting">
    @else
        <li class="nav-item">
        <a class="nav-link" href="/setting">
    @endif
            <i class="fas fa-fw fa-wrench"></i>
        <span>Setting</span></a>
    </li>

    @endif


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->