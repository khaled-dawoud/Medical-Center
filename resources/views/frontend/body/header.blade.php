@php
    $number = App\Models\Number::first();
@endphp

<!-- Header -->
<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="{{ route('site.index') }}" class="navbar-brand logo">
                <img src="{{ asset('frontend/assets/img/logo.png') }}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="{{ route('site.index') }}" class="menu-logo">
                    <img src="{{ asset('frontend/assets/img/logo.png') }}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav ml-5">
                <li class="active">
                    <a href="{{ route('site.index') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('site.all_doctors') }}">Doctors</i></a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('site.all_blogs') }}">Blog </a>
                </li>
                <li>
                    <a href="{{ route('admin.index') }}" target="_blank">Admin</a>
                </li>
                <li class="login-link">
                    <a href="login.html">Login / Signup</a>
                </li>
            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            <li class="nav-item contact-item">
                <div class="header-contact-img">
                    <i class="far fa-hospital"></i>
                </div>
                <div class="header-contact-detail">
                    <p class="contact-header">Contact</p>
                    <p class="contact-info-header">{{ $number->number }}</p>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link header-login" href="{{ route('login') }}">login / Signup </a>
            </li>
        </ul>
    </nav>
</header>
<!-- /Header -->
