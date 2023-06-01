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

            <li class="nav-item dropdown {{ request()->routeIs('admin_home_page') ? 'active' : '' }}||{{ request()->routeIs('admin_faq_page') ? 'active' : '' }}||{{ request()->routeIs('admin_blog_page') ? 'active' : '' }}||{{ request()->routeIs('admin_terms_page') ? 'active' : '' }}||{{ request()->routeIs('admin_contact_page') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Page Settings</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('admin_home_page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home_page') }}"><i class="fas fa-angle-right"></i> Home</a></li>
                    <li class="{{ request()->routeIs('admin_faq_page') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin_faq_page')}}"><i class="fas fa-angle-right"></i>Faq</a></li>
                    <li class="{{ request()->routeIs('admin_blog_page') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin_blog_page')}}"><i class="fas fa-angle-right"></i>Blog</a></li>
                    <li class="{{ request()->routeIs('admin_terms_page') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin_terms_page')}}"><i class="fas fa-angle-right"></i>Terms</a></li>
                    <li class="{{ request()->routeIs('admin_privacy_page') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin_privacy_page')}}"><i class="fas fa-angle-right"></i>Privacy Policy</a></li>
                    <li class="{{ request()->routeIs('admin_contact_page') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin_contact_page')}}"><i class="fas fa-angle-right"></i>Contact</a></li>
                    <li class="{{ request()->routeIs('admin_job_category_page') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin_job_category_page')}}"><i class="fas fa-angle-right"></i>Job Category</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Job Section</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link" href="{{route('admin_job_category')}}"><i class="fas fa-angle-right"></i> Job Category</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i>Job Location</a></li>
                </ul>
            </li>

            <li class="{{ request()->routeIs('admin_why_choose_item') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_why_choose_item') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="Why Choose Items"><i class="fas fa-hand-point-right"></i> <span>Why Choose Items</span></a></li>
            <li class="{{ request()->routeIs('admin_test_monials') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin_test_monials')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="Why Choose Items"><i class="fas fa-hand-point-right"></i> <span>Test Monials</span></a></li>
            <li class="{{ request()->routeIs('admin_post') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin_post')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="Why Choose Items"><i class="fas fa-hand-point-right"></i> <span>Post</span></a></li>
            <li class="{{ request()->routeIs('admin_faq') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin_faq')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="Why Choose Items"><i class="fas fa-hand-point-right"></i> <span>Faq</span></a></li>
        </ul>
    </aside>
</div>
