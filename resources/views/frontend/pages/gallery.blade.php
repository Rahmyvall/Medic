@extends('frontend.layouts.app')

@section('title', 'Gallery')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="breadcrumbs">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="bi bi-house"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Category</a></li>
                        <li class="breadcrumb-item active current">Gallery</li>
                    </ol>
                </nav>
            </div>

            <div class="title-wrapper">
                <h1>Gallery</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis,
                    pulvinar dapibus leo.</p>
            </div>
        </div><!-- End Page Title -->

        <!-- Gallery Section -->
        <section id="gallery" class="gallery section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                    <ul class="gallery-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-nature">Nature</li>
                        <li data-filter=".filter-architecture">Architecture</li>
                        <li data-filter=".filter-people">People</li>
                        <li data-filter=".filter-travel">Travel</li>
                    </ul><!-- End Gallery Filters -->

                    <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-nature">
                            <div class="gallery-card">
                                <div class="gallery-img">
                                    <img src="{{ asset('mediTrust-life/assets/img/gallery/gallery-1.webp') }}"
                                        class="img-fluid" alt="Gallery Image" loading="lazy">
                                    <div class="gallery-overlay">
                                        <div class="gallery-info">
                                            <h4>Nature Exploration</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            <a href="{{ asset('mediTrust-life/assets/img/gallery/gallery-1.webp') }}"
                                                class="glightbox gallery-link" data-gallery="gallery-images">
                                                <i class="bi bi-plus-circle"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->

                        <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-architecture">
                            <div class="gallery-card">
                                <div class="gallery-img">
                                    <img src="{{ asset('mediTrust-life/assets/img/gallery/gallery-2.webp') }}"
                                        class="img-fluid" alt="Gallery Image" loading="lazy">
                                    <div class="gallery-overlay">
                                        <div class="gallery-info">
                                            <h4>Modern Architecture</h4>
                                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                            <a href="{{ asset('mediTrust-life/assets/img/gallery/gallery-2.webp') }}"
                                                class="glightbox gallery-link" data-gallery="gallery-images">
                                                <i class="bi bi-plus-circle"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->

                        <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-people">
                            <div class="gallery-card">
                                <div class="gallery-img">
                                    <img src="{{ asset('mediTrust-life/assets/img/gallery/gallery-3.webp') }}"
                                        class="img-fluid" alt="Gallery Image" loading="lazy">
                                    <div class="gallery-overlay">
                                        <div class="gallery-info">
                                            <h4>Urban Life</h4>
                                            <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris.</p>
                                            <a href="{{ asset('mediTrust-life/assets/img/gallery/gallery-3.webp') }}"
                                                class="glightbox gallery-link" data-gallery="gallery-images">
                                                <i class="bi bi-plus-circle"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->

                        <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-travel">
                            <div class="gallery-card">
                                <div class="gallery-img">
                                    <img src="{{ asset('mediTrust-life/assets/img/gallery/gallery-4.webp') }}"
                                        class="img-fluid" alt="Gallery Image" loading="lazy">
                                    <div class="gallery-overlay">
                                        <div class="gallery-info">
                                            <h4>Travel Destinations</h4>
                                            <p>Aenean lacinia bibendum nulla sed consectetur.</p>
                                            <a href="{{ asset('mediTrust-life/assets/img/gallery/gallery-4.webp') }}"
                                                class="glightbox gallery-link" data-gallery="gallery-images">
                                                <i class="bi bi-plus-circle"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->

                        <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-nature">
                            <div class="gallery-card">
                                <div class="gallery-img">
                                    <img src="{{ asset('mediTrust-life/assets/img/gallery/gallery-5.webp') }}"
                                        class="img-fluid" alt="Gallery Image" loading="lazy">
                                    <div class="gallery-overlay">
                                        <div class="gallery-info">
                                            <h4>Natural Wonders</h4>
                                            <p>Cras mattis consectetur purus sit amet fermentum.</p>
                                            <a href="{{ asset('mediTrust-life/assets/img/gallery/gallery-5.webp') }}"
                                                class="glightbox gallery-link" data-gallery="gallery-images">
                                                <i class="bi bi-plus-circle"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->

                        <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-architecture">
                            <div class="gallery-card">
                                <div class="gallery-img">
                                    <img src="{{ asset('mediTrust-life/assets/img/gallery/gallery-6.webp') }}"
                                        class="img-fluid" alt="Gallery Image" loading="lazy">
                                    <div class="gallery-overlay">
                                        <div class="gallery-info">
                                            <h4>Historic Buildings</h4>
                                            <p>Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                            <a href="{{ asset('mediTrust-life/assets/img/gallery/gallery-6.webp') }}"
                                                class="glightbox gallery-link" data-gallery="gallery-images">
                                                <i class="bi bi-plus-circle"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->

                        <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-people">
                            <div class="gallery-card">
                                <div class="gallery-img">
                                    <img src="{{ asset('mediTrust-life/assets/img/gallery/gallery-7.webp') }}"
                                        class="img-fluid" alt="Gallery Image" loading="lazy">
                                    <div class="gallery-overlay">
                                        <div class="gallery-info">
                                            <h4>Community Events</h4>
                                            <p>Donec ullamcorper nulla non metus auctor fringilla.</p>
                                            <a href="{{ asset('mediTrust-life/assets/img/gallery/gallery-7.webp') }}"
                                                class="glightbox gallery-link" data-gallery="gallery-images">
                                                <i class="bi bi-plus-circle"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->

                        <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-travel">
                            <div class="gallery-card">
                                <div class="gallery-img">
                                    <img src="{{ asset('mediTrust-life/assets/img/gallery/gallery-8.webp') }}"
                                        class="img-fluid" alt="Gallery Image" loading="lazy">
                                    <div class="gallery-overlay">
                                        <div class="gallery-info">
                                            <h4>Exotic Locations</h4>
                                            <p>Sed posuere consectetur est at lobortis.</p>
                                            <a href="{{ asset('mediTrust-life/assets/img/gallery/gallery-8.webp') }}"
                                                class="glightbox gallery-link" data-gallery="gallery-images">
                                                <i class="bi bi-plus-circle"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                    </div><!-- End Gallery Container -->
                </div>

            </div>

        </section><!-- /Gallery Section -->

    </main>
@endsection
