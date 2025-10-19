

<?php $__env->startSection('title', 'Departments Details'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="breadcrumbs">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="bi bi-house"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Category</a></li>
                        <li class="breadcrumb-item active current">Department Details</li>
                    </ol>
                </nav>
            </div>

            <div class="title-wrapper">
                <h1>Department Details</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis,
                    pulvinar dapibus leo.</p>
            </div>
        </div><!-- End Page Title -->

        <!-- Department Details Section -->
        <section id="department-details" class="department-details section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                    <div class="col-lg-8 mx-auto text-center intro" data-aos="fade-up" data-aos-delay="200">
                        <h2>Cardiology Department</h2>
                        <div class="divider mx-auto"></div>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                        </p>
                    </div>
                </div>

                <div class="department-overview mt-5">
                    <div class="row gy-4">
                        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="300">
                            <div class="department-image">
                                <img src="<?php echo e(asset('mediTrust-life/assets/img/health/cardiology-1.webp')); ?>"
                                    alt="Cardiology Department" class="img-fluid rounded-lg">
                                <div class="experience-badge">
                                    <span>15+</span>
                                    <p>Years of Excellence</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                            <div class="department-services">
                                <div class="service-card">
                                    <div class="icon"><i class="bi bi-heart-pulse"></i></div>
                                    <div class="content">
                                        <h4>Comprehensive Cardiac Care</h4>
                                        <p>Pellentesque in ipsum id orci porta dapibus. Vivamus magna justo, lacinia eget
                                            consectetur sed, convallis at tellus.</p>
                                    </div>
                                </div>

                                <div class="service-card">
                                    <div class="icon"><i class="bi bi-activity"></i></div>
                                    <div class="content">
                                        <h4>Advanced Diagnostics</h4>
                                        <p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Nulla porttitor
                                            accumsan tincidunt.</p>
                                    </div>
                                </div>

                                <div class="service-card">
                                    <div class="icon"><i class="bi bi-person-heart"></i></div>
                                    <div class="content">
                                        <h4>Personalized Treatment Plans</h4>
                                        <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam
                                            sit amet quam vehicula elementum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="department-stats" data-aos="fade-up" data-aos-delay="400">
                    <div class="row gy-4">
                        <div class="col-md-3 col-6">
                            <div class="stat-item">
                                <div class="number purecounter" data-purecounter-start="0" data-purecounter-end="2500"
                                    data-purecounter-duration="2">0</div>
                                <p>Patients Treated</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="stat-item">
                                <div class="number purecounter" data-purecounter-start="0" data-purecounter-end="12"
                                    data-purecounter-duration="2">0</div>
                                <p>Specialized Doctors</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="stat-item">
                                <div class="number purecounter" data-purecounter-start="0" data-purecounter-end="98"
                                    data-purecounter-duration="2">0</div>
                                <p>Success Rate</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="stat-item">
                                <div class="number purecounter" data-purecounter-start="0" data-purecounter-end="24"
                                    data-purecounter-duration="2">0</div>
                                <p>Hours Service</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="key-services mt-5" data-aos="fade-up" data-aos-delay="500">
                    <div class="row gy-4">
                        <div class="col-lg-5" data-aos="fade-right" data-aos-delay="600">
                            <h3>Our Specialized Services</h3>
                            <p>Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh
                                pulvinar a. Vestibulum ac diam sit amet quam vehicula.</p>
                            <ul class="service-list">
                                <li><i class="bi bi-check-circle-fill"></i> Comprehensive cardiac evaluations</li>
                                <li><i class="bi bi-check-circle-fill"></i> Advanced interventional procedures</li>
                                <li><i class="bi bi-check-circle-fill"></i> Heart failure management plans</li>
                                <li><i class="bi bi-check-circle-fill"></i> Preventive cardiology consultations</li>
                                <li><i class="bi bi-check-circle-fill"></i> Cardiac rehabilitation programs</li>
                            </ul>
                        </div>
                        <div class="col-lg-7" data-aos="fade-left" data-aos-delay="600">
                            <div class="cta-wrapper">
                                <div class="cta-content">
                                    <h3>Expert Care When You Need It Most</h3>
                                    <p>Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat, accumsan
                                        id imperdiet et, porttitor at sem. Proin eget tortor risus.</p>
                                    <div class="cta-buttons">
                                        <a href="<?php echo e(route('frontend.appointment')); ?>" class="btn btn-primary">Book
                                            Appointment</a>
                                        <a href="services.html" class="btn btn-outline">Learn More</a>
                                    </div>
                                </div>
                                <div class="cta-image">
                                    <img src="<?php echo e(asset('mediTrust-life/assets/img/health/cardiology-3.webp')); ?>"
                                        alt="Cardiology Team" class="img-fluid rounded-lg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Department Details Section -->

    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mediclaravel\resources\views/frontend/pages/department-details.blade.php ENDPATH**/ ?>