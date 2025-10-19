<header id="header" class="header d-flex align-items-center fixed-top">
    <div
        class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <img src="<?php echo e(asset('mediTrust-life/assets/img/Kasih-Ibu-Hospital-logo.webp')); ?>" alt="MediTrust Logo"
                class="img-fluid" style="height: 40px; margin-right: 8px;">
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="<?php echo e(route('frontend.about')); ?>"
                        class="<?php echo e(request()->routeIs('frontend.about') ? 'active' : ''); ?>">About</a></li>
                <li><a href="<?php echo e(route('frontend.departments')); ?>"
                        class="<?php echo e(request()->routeIs('frontend.departments') ? 'active' : ''); ?>">Departments</a></li>
                <li><a href="<?php echo e(route('frontend.services')); ?>"
                        class="<?php echo e(request()->routeIs('frontend.services') ? 'active' : ''); ?>">Services</a></li>
                <li class="dropdown">
                    <a href="#"><span>More Pages</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="<?php echo e(route('frontend.department-details')); ?>">Department Details</a></li>
                        <li><a href="<?php echo e(route('frontend.service-details')); ?>">Service Details</a></li>
                        <li><a href="<?php echo e(route('frontend.appointment')); ?>">Appointment</a></li>
                        <li><a href="<?php echo e(route('frontend.testimonials')); ?>">Testimonials</a></li>
                        <li><a href="<?php echo e(route('frontend.questions')); ?>">Frequently Asked Questions</a></li>
                        <li><a href="<?php echo e(route('frontend.gallery')); ?>">Gallery</a></li>
                        <li><a href="<?php echo e(route('frontend.terms')); ?>">Terms</a></li>
                        <li><a href="<?php echo e(route('frontend.privacy')); ?>">Privacy</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo e(route('frontend.contact')); ?>"
                        class="<?php echo e(request()->routeIs('frontend.contact') ? 'active' : ''); ?>">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>


        <a class="btn-getstarted" href="/login">Login</a>

    </div>
</header>
<?php /**PATH C:\laragon\www\mediclaravel\resources\views/frontend/partials/navbar.blade.php ENDPATH**/ ?>