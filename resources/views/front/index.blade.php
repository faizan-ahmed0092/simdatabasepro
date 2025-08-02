@extends('layouts.master')
@section('title', "SIM Database Pro - Home")
@section('description', "Description")
@push('css')
{{-- <link rel="stylesheet" href="{{ asset('assets/css/modern-design.css') }}"> --}}
{{-- <style>
   .swiper-button-next, .swiper-button-prev {
        color: var(--primary-color);
    }
    .swiper-button-next,
  .swiper-button-prev {
    width: 40px;
    height: 40px;
    background-color: var(--primary-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    box-shadow: var(--shadow-md);
  }

  .swiper-button-next::after,
  .swiper-button-prev::after {
    font-size: 18px;
  }

  .swiper-button-next {
    right: 15px;
  }

  .swiper-button-prev {
    left: 15px;
  }
</style> --}}
@endpush
@section('content')



<!-- CTA Section -->
<div class="container">
    <div class="cta-section-modern">
        <div class="row align-items-center g-0">
            <!-- Icon/Badge -->
            <div class="col-lg-2 d-flex justify-content-center align-items-center mb-4 mb-lg-0">
                <div class="cta-badge">
                    <i class="bi bi-stars"></i>
                </div>
            </div>
            <!-- Text Content -->
            <div class="col-lg-7 text-center text-lg-start mb-4 mb-lg-0">
                <h2 class="cta-title-modern">Unlock Premium Features</h2>
                <p class="cta-subtitle-modern">Get advanced SIM tracking, detailed reports, and priority support with our premium services.</p>
            </div>
            <!-- Button -->
            <div class="col-lg-3 d-flex justify-content-center align-items-center">
                <a href="https://admin.pakbills.com/app-numbers/redirect" class="cta-button-modern">
                    <i class="bi bi-whatsapp me-2"></i>Contact Admin
                </a>
            </div>
        </div>
    </div>
</div>

<!-- About & Services Components -->
@include('front.components.aboutus')
@include('front.components.services')
@include('front.components.contactus')

<!-- Reviews Section -->
{{-- <section class="review-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">What Our Users Say</h2>
            <p class="section-subtitle">Real feedback from satisfied customers using SIM Database Pro</p>
        </div>

        <div class="swiper review-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="review-card">
                        <div class="review-author">
                            <img src="{{ asset('images/user_01.avif') }}" alt="User 1" class="review-avatar">
                            <div class="review-info">
                                <h6>Ali Khan</h6>
                                <p>Lahore, Pakistan</p>
                            </div>
                        </div>
                        <p class="review-text">"simdatabase.pro quickly showed me all SIMs linked to my CNIC, with names and addresses."</p>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="review-card">
                        <div class="review-author">
                            <img src="{{ asset('images/user_07.avif') }}" alt="User 2" class="review-avatar">
                            <div class="review-info">
                                <h6>Fatima Iqbal</h6>
                                <p>Karachi, Pakistan</p>
                            </div>
                        </div>
                        <p class="review-text">"I had no idea there were extra numbers on my CNIC—this site helped me find and report them."</p>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="review-card">
                        <div class="review-author">
                            <img src="{{ asset('images/user_03.avif') }}" alt="User 3" class="review-avatar">
                            <div class="review-info">
                                <h6>Ahmed Raza</h6>
                                <p>Islamabad, Pakistan</p>
                            </div>
                        </div>
                        <p class="review-text">"Very helpful service! I checked my CNIC and saw all registered numbers with full details."</p>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="review-card">
                        <div class="review-author">
                            <img src="{{ asset('images/user_05.jpg') }}" alt="User 4" class="review-avatar">
                            <div class="review-info">
                                <h6>Sana Malik</h6>
                                <p>Rawalpindi, Pakistan</p>
                            </div>
                        </div>
                        <p class="review-text">"It's a great tool to track SIM ownership and prevent CNIC misuse."</p>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="review-card">
                        <div class="review-author">
                            <img src="{{ asset('images/user_04.avif') }}" alt="User 5" class="review-avatar">
                            <div class="review-info">
                                <h6>Usman Ali</h6>
                                <p>Faisalabad, Pakistan</p>
                            </div>
                        </div>
                        <p class="review-text">"I used it to check my family members' CNICs—everything was accurate and up to date."</p>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="review-card">
                        <div class="review-author">
                            <img src="{{ asset('images/user_06.jpg') }}" alt="User 6" class="review-avatar">
                            <div class="review-info">
                                <h6>Ayesha Khan</h6>
                                <p>Multan, Pakistan</p>
                            </div>
                        </div>
                        <p class="review-text">"The site gave me my full CNIC info, including name, address, and every linked SIM."</p>
                    </div>
                </div>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination mt-4"></div>
        </div>
    </div>
</section> --}}

<!-- Content Section -->
<section class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content-card">
                    <h2>Welcome to simdatabase.pro - Your Trustworthy SIM Information Platform</h2>
<p>At simdatabase.pro, we provide you with fast and trustworthy access to valuable SIM information in Pakistan. Whether you need SIM owner details, want to verify your SIM card, or need network provider details, we provide you with access to all of it with accurate and real-time tools.</p>
                </div>

                <div class="content-card">
                    <h2>Live Tracker</h2>
                    <p>If you require monitoring SIM details in real time, simdatabase Live Tracker is the best for you. It provides you with SIM card ownership, CNIC, and network provider within seconds. Our tracker offers you accurate and real-time information for any number in Pakistan. Whether you're tracking a lost contact, verifying SIM details, or confirming SIM registration details, simdatabase is the trusted solution for you.</p>
                </div>

                <div class="content-card">
                    <h2>SIM Information</h2>
                    <p>On simdatabase we give you the ability to obtain complete SIM Information in a few clicks. You can utilize our site to verify ownership of your SIM card or obtain any other SIM information if required. Just provide the mobile number or CNIC and acquire the owner name, CNIC, network operator and registration status in an instant. We do our best to give you only genuine SIM information, which helps prevent fraud and protect your online identity.</p>
                </div>

                <div class="content-card">
                    <h2>You Get the SIM Owner Details at simdatabase.pro</h2>
                    <p>You can identify the owner of any SIM card on our website just by entering the mobile number or CNIC. You get the owner name, CNIC, and network provider data in real-time. SIM ownership verification is required to prevent fraud and protect your identity. If you think any SIM is being used illegally or want to know in advance before purchasing a used SIM, on our platform you get all this easily, safely, and without any trouble.</p>
                </div>

                <div class="content-card">
                    <h2>Why Choose Us?</h2>
                    <p>Why prefer SimOwners.info? We offer you some unique and reliable services which you don't find elsewhere. Here are some reasons:</p>
                    <ul class="feature-list">
                        <li><strong>Accuracy and Reliability:</strong> We deliver only verified and original SIM details. The information you receive is accurate and reliable.</li>
                        <li><strong>Fast and Easy Access:</strong> Our site provides you with fast and easy access. You can check your SIM details or SIM owner info within seconds.</li>
                        <li><strong>User-Friendly Interface:</strong> We have a basic and easy-to-use interface in our website and tools. It is easy to verify your SIM details without confusion.</li>
                        <li><strong>Secure and Confidential:</strong> Privacy matters the most to us. Your data will remain safe, and we don't disclose any information about you to any third-party.</li>
                        <li><strong>Complete Support:</strong> Our team is providing 24/7 support so that you have an immediate solution for any kind of issue anytime you want.</li>
                    </ul>
                    <p class="mt-4">If you wish to confirm your SIM information, go to simdatabase and instantly verify your SIM information through our reliable tools!</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script>
        new Swiper('.review-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });
    </script>
@endpush

