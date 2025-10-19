

<?php $__env->startSection('title', 'Doctors'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="breadcrumbs">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="bi bi-house"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Category</a></li>
                        <li class="breadcrumb-item active current">Doctors</li>
                    </ol>
                </nav>
            </div>

            <div class="title-wrapper">
                <h1>Doctors</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper
                    mattis, pulvinar dapibus leo.</p>
            </div>
        </div><!-- End Page Title -->

        <!-- Doctors Section -->
        <section id="doctors" class="doctors section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="doctor-card">
                            <div class="doctor-image">
                                <img src="<?php echo e(asset('mediTrust-life/assets/img/health/staff-3.webp')); ?>"
                                    alt="Dr. Jennifer Martinez" class="img-fluid">
                                <div class="doctor-overlay">
                                    <div class="doctor-social">
                                        <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                                        <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
                                        <a href="#" class="social-link"><i class="bi bi-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="doctor-content">
                                <h4 class="doctor-name">Dr. Jennifer Martinez</h4>
                                <span class="doctor-specialty">Chief of Cardiology</span>
                                <p class="doctor-bio">Mauris blandit aliquet elit eget tincidunt nibh pulvinar a.
                                    Curabitur arcu erat accumsan id imperdiet et porttitor at.</p>
                                <div class="doctor-experience">
                                    <span class="experience-badge">15+ Years Experience</span>
                                </div>
                                <a href="<?php echo e(route('frontend.appointment')); ?>" class="btn-appointment">Book Appointment</a>
                            </div>
                        </div>
                    </div><!-- End Doctor Card -->

                </div>

            </div>

        </section><!-- /Doctors Section -->

    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mediclaravel\resources\views/frontend/pages/doctors.blade.php ENDPATH**/ ?>