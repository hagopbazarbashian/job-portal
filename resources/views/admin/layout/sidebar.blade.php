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

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Job Section</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link" href="{{route('admin_job_category')}}"><i class="fas fa-angle-right"></i> Job Category</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i>Job Location</a></li>
                </ul>
            </li>

           
        </ul>
    </aside>
</div>
