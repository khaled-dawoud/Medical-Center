<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="/" class="logo">
            <img src="{{ asset('backend/assets/img/logo.png') }}" alt="Logo">
        </a>
        <a href="/" class="logo logo-small">
            <img src="{{ asset('backend/assets/img/logo-small.png') }}" alt="Logo" width="30" height="30">
        </a>
    </div>
    <!-- /Logo -->

    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>

    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Right Menu -->
    <ul class="nav user-menu">


        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img class="rounded-circle" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" width="31" alt=""></span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="User Image" class="avatar-img rounded-circle">
                    </div>
                    <div class="user-text">
                        <h6>{{ Auth::user()->name  }}</h6>
                        <p class="text-muted mb-0">{{ Auth::user()->type }}</p>
                    </div>
                </div>
                <a class="dropdown-item" href="{{ route('admin.profile') }}">My Profile</a>
                <a class="dropdown-item" href="{{ route('admin.edit_profile') }}">Edit Profile</a>
                <a class="dropdown-item" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        <!-- /User Menu -->

    </ul>
    <!-- /Header Right Menu -->

</div>
<!-- /Header -->
