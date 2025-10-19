

<?php $__env->startSection('title', 'About'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="breadcrumbs">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="bi bi-house"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Category</a></li>
                        <li class="breadcrumb-item active current">About</li>
                    </ol>
                </nav>
            </div>

            <div class="title-wrapper">
                <h1>About</h1>
                <p>Didukung dokter ahli dan fasilitas canggih, kami hadir untuk keselamatan dan kenyamanan pasien.
                    Visi kami: menjadi rumah sakit unggulan yang profesional dan inovatif.</p>
            </div>
        </div><!-- End Page Title -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                    
                    <div class="col-lg-6">
                        <div class="content">
                            <h2><?php echo e($about->title ?? 'Committed to Excellence in Healthcare'); ?></h2>

                            <?php if($about->description): ?>
                                <p><?php echo e($about->description); ?></p>
                            <?php endif; ?>

                            <?php if($about->vision): ?>
                                <p><strong>Vision:</strong> <?php echo e($about->vision); ?></p>
                            <?php endif; ?>

                            <?php if($about->mission): ?>
                                <p><strong>Mission:</strong> <?php echo nl2br(e($about->mission)); ?></p>
                            <?php endif; ?>

                            
                            <div class="stats-container" data-aos="fade-up" data-aos-delay="200">
                                <div class="row gy-4">
                                    <div class="col-sm-6 col-lg-12 col-xl-6">
                                        <div class="stat-item">
                                            <div class="stat-number">
                                                <span data-purecounter-start="0"
                                                    data-purecounter-end="<?php echo e($about->experience_years ?? 25); ?>"
                                                    data-purecounter-duration="1" class="purecounter"></span>+
                                            </div>
                                            <div class="stat-label">Years of Experience</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-12 col-xl-6">
                                        <div class="stat-item">
                                            <div class="stat-number">
                                                <span data-purecounter-start="0"
                                                    data-purecounter-end="<?php echo e($about->patients_treated ?? 50000); ?>"
                                                    data-purecounter-duration="2" class="purecounter"></span>+
                                            </div>
                                            <div class="stat-label">Patients Treated</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="cta-buttons" data-aos="fade-up" data-aos-delay="300">
                                <a href="<?php echo e($about->doctors_link ?? '#'); ?>" class="btn-primary">Meet Our Doctors</a>
                                <a href="<?php echo e($about->services_link ?? '#'); ?>" class="btn-secondary">View Our Services</a>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-lg-6">
                        <div class="image-section" data-aos="fade-left" data-aos-delay="200">
                            <?php
                                // Pastikan image array
                                $images = is_array($about->image) ? $about->image : json_decode($about->image, true);
                            ?>

                            <?php if($images && count($images) > 0): ?>
                                
                                <div class="main-image mb-3">
                                    <img src="<?php echo e(asset('storage/' . $images[0])); ?>" alt="Healthcare image"
                                        class="img-fluid">
                                </div>

                                
                                <div class="image-grid d-flex gap-2">
                                    <?php for($i = 1; $i < count($images) && $i <= 2; $i++): ?>
                                        <div class="grid-item flex-fill">
                                            <img src="<?php echo e(asset('storage/' . $images[$i])); ?>" alt="Healthcare image"
                                                class="img-fluid">
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            <?php else: ?>
                                <p class="text-muted">Belum ada gambar tersedia.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="certifications-section" data-aos="fade-up" data-aos-delay="400">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h3>Accreditations &amp; Certifications</h3>
                            <p>We are proud to be accredited by leading healthcare organizations</p>
                        </div>
                        <div class="certifications-grid">
                            <div class="certification-item">
                                <img src="<?php echo e(asset('mediTrust-life/assets/img/clients/clients-1.webp')); ?>"
                                    alt="JCI Accreditation" class="img-fluid">
                            </div>
                            <div class="certification-item">
                                <img src="<?php echo e(asset('mediTrust-life/assets/img/clients/clients-2.webp')); ?>"
                                    alt="NABH Certification" class="img-fluid">
                            </div>
                            <div class="certification-item">
                                <img src="<?php echo e(asset('mediTrust-life/assets/img/clients/clients-3.webp')); ?>" alt="ISO 9001"
                                    class="img-fluid">
                            </div>
                            <div class="certification-item">
                                <img src="<?php echo e(asset('mediTrust-life/assets/img/clients/clients-4.webp')); ?>"
                                    alt="CAP Accreditation" class="img-fluid">
                            </div>
                            <div class="certification-item">
                                <img src="<?php echo e(asset('mediTrust-life/assets/img/clients/clients-5.webp')); ?>"
                                    alt="Medical Board" class="img-fluid">
                            </div>
                            <div class="certification-item">
                                <img src="<?php echo e(asset('mediTrust-life/assets/img/clients/clients-6.webp')); ?>"
                                    alt="Healthcare Association" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>

        </section><!-- /About Section -->

    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mediclaravel\resources\views/frontend/pages/about.blade.php ENDPATH**/ ?>