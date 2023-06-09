<ul class="list-group list-group-flush">
        <li class="list-group-item {{ request()->routeIs('company_dashboard') ? 'active' : '' }}">
            <a href="{{ route('company_dashboard') }}">Dashboard</a>
        </li>
        <li class="list-group-item {{ request()->routeIs('company_make_payment') ? 'active' : '' }}">
            <a href="{{route('company_make_payment')}}">Make Payment</a>
        </li>
        <li class="list-group-item {{ request()->routeIs('company_orders') ? 'active' : '' }}">
            <a href="{{route('company_orders')}}">Orders</a>
        </li>
        <li class="list-group-item">
            <a href="company-job-add.html">Create Job</a>
        </li>
        <li class="list-group-item">
            <a href="company-jobs.html">All Jobs</a>
        </li>
        <li class="list-group-item">
            <a href="company-photos.html">Photos</a>
        </li>
        <li class="list-group-item">
            <a href="company-videos.html">Videos</a>
        </li>
        <li class="list-group-item">
            <a href="company-applications.html">Candidate Applications</a>
        </li>
        <li class="list-group-item">
            <a href="company-edit-profile.html">Edit Profile</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('company_logout') }}">Logout</a>
        </li>
</ul>
