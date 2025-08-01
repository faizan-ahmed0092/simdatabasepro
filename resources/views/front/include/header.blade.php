

@if(url()->current() == route('index'))
<div class="container-fluid">
    @include('front.components.navbar')
</div>

<!-- Modern Hero Section with SIM Checker -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">SIM Database Pro</h1>
            <p class="hero-subtitle">Get instant access to SIM details, CNIC information, and real-time tracking services</p>
            
            <div class="sim-checker-card">
                <div class="checker-header">
                    <div class="checker-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    {{-- <h3 class="checker-title">SIM Record Checker</h3> --}}
                    <p class="checker-subtitle">Enter any SIM number to get detailed information</p>
                </div>
                
                <form action="{{ route('result') }}" method="POST" class="checker-form">
                    @csrf
                    <div class="input-group-modern">
                        <span class="input-icon">
                            <i class="bi bi-phone"></i>
                        </span>
                        <input type="text" name="number" class="checker-input" 
                               placeholder="Enter SIM Number (e.g., 3001234567)" required>
                        <button type="submit" class="checker-btn">
                            <i class="bi bi-search me-2"></i>Check Record
                        </button>
                    </div>
                </form>
                
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <span class="feature-text">Name & CNIC</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <span class="feature-text">Address</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-wifi"></i>
                        </div>
                        <span class="feature-text">SIM Network</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-activity"></i>
                        </div>
                        <span class="feature-text">Live Status</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@else
@include('front.components.navbar')
@endif