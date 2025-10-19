

<?php $__env->startSection('title', 'Contact'); ?>

<?php $__env->startSection('content'); ?>
    <main class="main">
        <!-- Page Title -->
        <div class="page-title">
            <div class="breadcrumbs">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="bi bi-house"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Category</a></li>
                        <li class="breadcrumb-item active current">Contact</li>
                    </ol>
                </nav>
            </div>

            <div class="title-wrapper">
                <h1>Contact</h1>
                <p>Kami senang mendengar dari Anda. Hubungi kami untuk pertanyaan atau masukan.</p>
            </div>
        </div><!-- End Page Title -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <div class="container">
                <div class="contact-wrapper">
                    <div class="contact-info-panel">
                        <div class="contact-info-header">
                            <h3>Contact Information</h3>
                            <p>Terhubung dengan kami untuk informasi terbaru dan penawaran menarik.</p>
                        </div>

                        <div class="contact-info-cards">
                            <div class="info-card">
                                <div class="icon-container">
                                    <i class="bi bi-pin-map-fill"></i>
                                </div>
                                <div class="card-content">
                                    <h4>Our Location</h4>
                                    <p>4952 Hilltop Dr, Anytown, CA 90210</p>
                                </div>
                            </div>

                            <div class="info-card">
                                <div class="icon-container">
                                    <i class="bi bi-envelope-open"></i>
                                </div>
                                <div class="card-content">
                                    <h4>Email Us</h4>
                                    <p>info@example.com</p>
                                </div>
                            </div>

                            <div class="info-card">
                                <div class="icon-container">
                                    <i class="bi bi-telephone-fill"></i>
                                </div>
                                <div class="card-content">
                                    <h4>Call Us</h4>
                                    <p>+1 (555) 123-4567</p>
                                </div>
                            </div>

                            <div class="info-card">
                                <div class="icon-container">
                                    <i class="bi bi-clock-history"></i>
                                </div>
                                <div class="card-content">
                                    <h4>Working Hours</h4>
                                    <p>Monday-Saturday: 9AM - 7PM</p>
                                </div>
                            </div>
                        </div>

                        <div class="social-links-panel">
                            <h5>Follow Us</h5>
                            <div class="social-icons">
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                <a href="#"><i class="bi bi-youtube"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="contact-form-panel">
                        <div class="map-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.1463203364106!2d115.20272050993627!3d-8.677632288313285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd240ea9fbbc8f1%3A0x1ec30da642241722!2sKasih%20Ibu%20General%20Hospital%20Denpasar!5e0!3m2!1sen!2sid!4v1760587127676!5m2!1sen!2sid"
                                width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                        <div class="form-container">
                            <h3>Send Us a Message</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit mauris hendrerit faucibus imperdiet
                                nec eget felis.</p>

                            <form action="forms/contact.php" method="post" class="php-email-form">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nameInput" name="name"
                                        placeholder="Full Name" required="">
                                    <label for="nameInput">Full Name</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="emailInput" name="email"
                                        placeholder="Email Address" required="">
                                    <label for="emailInput">Email Address</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="subjectInput" name="subject"
                                        placeholder="Subject" required="">
                                    <label for="subjectInput">Subject</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="messageInput" name="message" rows="5" placeholder="Your Message"
                                        style="height: 150px" required=""></textarea>
                                    <label for="messageInput">Your Message</label>
                                </div>

                                <div class="my-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn-submit">Send Message <i
                                            class="bi bi-send-fill ms-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Contact Section -->

    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mediclaravel\resources\views/frontend/pages/contact.blade.php ENDPATH**/ ?>