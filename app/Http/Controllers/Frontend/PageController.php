<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;


class PageController extends Controller
{
    /**
     * Menampilkan halaman Home
     */
    public function homepage()
    {
        return view('frontend.pages.homepage');
    }

    /**
     * Menampilkan halaman About
     */
    public function about()
    {
        $about = AboutUs::first(); // ambil 1 data saja
        return view('frontend.pages.about');
    }

    /**
     * Menampilkan halaman Doctors
     */
    

    /**
     * Menampilkan halaman Departments
     */
    public function departments()
    {
        return view('frontend.pages.departments');
    }

    /**
     * Menampilkan halaman Department Details
     */
    public function departmentDetails()
    {
        return view('frontend.pages.department-details');
    }

    /**
     * Menampilkan halaman Appointment
     */
    public function appointment()
    {
        return view('frontend.pages.appointment');
    }

    /**
     * Menampilkan halaman Testimonials
     */
    public function testimonials()
    {
        return view('frontend.pages.testimonials');
    }

    /**
     * Menampilkan halaman Service Details
     */
    public function serviceDetails()
    {
        return view('frontend.pages.service-details');
    }

    /**
     * Menampilkan halaman Gallery
     */
    public function gallery()
    {
        return view('frontend.pages.gallery');
    }

    /**
     * Menampilkan halaman Terms
     */
    public function terms()
    {
        return view('frontend.pages.terms');
    }

    /**
     * Menampilkan halaman FAQ (Questions)
     */
    public function questions()
    {
        return view('frontend.pages.questions');
    }

    /**
     * Menampilkan halaman Privacy
     */
    public function privacy()
    {
        return view('frontend.pages.privacy');
    }

    /**
     * Menampilkan halaman Contact
     */
    public function contact()
    {
        return view('frontend.pages.contact');
    }

    /**
     * Menampilkan halaman Services
     */
    public function services()
    {
        return view('frontend.pages.services');
    }
}