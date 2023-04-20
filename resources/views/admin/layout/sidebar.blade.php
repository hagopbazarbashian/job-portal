<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>

        <ul class="sidebar-menu">
  
            <li class="{{ request()->routeIs('admin_home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Page Settings</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link" href="{{ route('admin_home_page') }}"><i class="fas fa-angle-right"></i> Home</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Terms</a></li>
                </ul>
            </li> 

            <li class=""><a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Setting"><i class="fas fa-hand-point-right"></i> <span>Setting</span></a></li>

            <li class=""><a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Form"><i class="fas fa-hand-point-right"></i> <span>Form</span></a></li>

            <li class="" ><a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Table"><i class="fas fa-hand-point-right"></i> <span>Table</span></a></li>

            <li class="" ><a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Invoice"><i class="fas fa-hand-point-right"></i> <span>Invoice</span></a></li>

        </ul>
    </aside>   
</div>