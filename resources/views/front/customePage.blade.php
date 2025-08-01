
@extends('layouts.master')
@section('title', $page->title ?? "")
@section('description', $page->meta_description ?? "")
@push('css')
{{-- <link rel="stylesheet" href="{{ asset('assets/css/modern-design.css') }}"> --}}
@endpush

@section('content')

<div class="container mt-5">
    @if($page->appearance_type == 'Navbar')
        <div class="row mb-5">
            <div class="col-lg-6 col-md-6 col-12">
                <!-- Modern Search Section -->
                <div class="modern-search-section">
                    <div class="search-content">
                        <div class="search-badge">
                            <i class="bi bi-search-heart"></i>
                        </div>
                        <h2 class="modern-search-title">Advanced Database Search</h2>
                        <p class="modern-search-subtitle">Get instant access to comprehensive SIM and CNIC information</p>
                        
                        <form action="{{ route('result') }}" method="POST" class="modern-search-form">
                            @csrf
                            <div class="modern-input-group">
                                <div class="input-wrapper-modern">
                                    <i class="bi bi-phone"></i>
                                    <input 
                                        name="number"
                                        type="text" 
                                        class="modern-input" 
                                        placeholder="Enter Mobile Number or CNIC" 
                                        required>
                                </div>
                                <button class="cta-button-modern" type="submit">
                                    <i class="bi bi-search"></i>
                                    <span>Search Now</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-6 col-12">
                <!-- Modern Features Section -->
                <div class="modern-features-section">
                    <div class="features-header">
                        <h3 class="features-title">What You'll Get</h3>
                        <p class="features-subtitle">Comprehensive information at your fingertips</p>
                    </div>
                    
                    <div class="modern-features-grid">
                        <div class="modern-feature-card">
                            <div class="feature-icon-modern">
                                <i class="bi bi-person-badge"></i>
                            </div>
                            <div class="feature-details">
                                <h4>Name & Address</h4>
                                <p>Complete owner details with verified information</p>
                            </div>
                        </div>
                        
                        <div class="modern-feature-card">
                            <div class="feature-icon-modern">
                                <i class="bi bi-card-text"></i>
                            </div>
                            <div class="feature-details">
                                <h4>CNIC Details</h4>
                                <p>Full CNIC information and verification status</p>
                            </div>
                        </div>
                        
                        <div class="modern-feature-card">
                            <div class="feature-icon-modern">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <div class="feature-details">
                                <h4>Real-time Data</h4>
                                <p>Up-to-date records from latest databases</p>
                            </div>
                        </div>
{{--                         
                        <div class="modern-feature-card">
                            <div class="feature-icon-modern">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <div class="feature-details">
                                <h4>Secure Access</h4>
                                <p>Protected and encrypted database access</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    <h1 class="text-center fw-bolder display-4">{{  $page->page_heading }}</h1>
    <div class="content_body ck_fix col-12 pt-5">
        {!! $page->content ?? "" !!}
    </div>
</div>

@endsection

@push('js')
<script>
// Add smooth animations
document.addEventListener('DOMContentLoaded', function() {
    const featureCards = document.querySelectorAll('.modern-feature-card');
    
    featureCards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('animate-in');
        }, index * 150);
    });
});
</script>
@endpush