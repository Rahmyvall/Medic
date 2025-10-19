<header id="header" class="header d-flex align-items-center fixed-top">
    <div
        class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <img src="{{ asset('mediTrust-life/assets/img/Kasih-Ibu-Hospital-logo.webp') }}" alt="MediTrust Logo"
                class="img-fluid" style="height: 40px; margin-right: 8px;">
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('frontend.about') }}"
                        class="{{ request()->routeIs('frontend.about') ? 'active' : '' }}">About</a></li>
                <li><a href="{{ route('frontend.departments') }}"
                        class="{{ request()->routeIs('frontend.departments') ? 'active' : '' }}">Departments</a></li>
                <li><a href="{{ route('frontend.services') }}"
                        class="{{ request()->routeIs('frontend.services') ? 'active' : '' }}">Services</a></li>
                <li class="dropdown">
                    <a href="#"><span>More Pages</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('frontend.department-details') }}">Department Details</a></li>
                        <li><a href="{{ route('frontend.service-details') }}">Service Details</a></li>
                        <li><a href="{{ route('frontend.appointment') }}">Appointment</a></li>
                        <li><a href="{{ route('frontend.testimonials') }}">Testimonials</a></li>
                        <li><a href="{{ route('frontend.questions') }}">Frequently Asked Questions</a></li>
                        <li><a href="{{ route('frontend.gallery') }}">Gallery</a></li>
                        <li><a href="{{ route('frontend.terms') }}">Terms</a></li>
                        <li><a href="{{ route('frontend.privacy') }}">Privacy</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('frontend.contact') }}"
                        class="{{ request()->routeIs('frontend.contact') ? 'active' : '' }}">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>


        <a class="btn-getstarted" href="/login">Login</a>

    </div>
</header>
