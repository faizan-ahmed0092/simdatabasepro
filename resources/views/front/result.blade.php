@extends('layouts.master')
@section('title', 'Search Results - SIM Database Pro')
@section('description', 'View your SIM and CNIC search results')
@push('css')
{{-- <link rel="stylesheet" href="{{ asset('assets/css/modern-design.css') }}"> --}}
@endpush

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <!-- Modern Result Header -->
            <div class="modern-result-header">
                <div class="result-badge">
                    <i class="bi bi-search"></i>
                </div>
                <h1 class="result-title">Search Results</h1>
                <p class="result-subtitle">Your database search results are ready</p>
            </div>

            <!-- Modern Result Container -->
            <div class="modern-result-container">
                @if($data == 'invalid')
                    <div class="modern-alert-warning">
                        <div class="alert-icon">
                            <i class="bi bi-exclamation-triangle"></i>
                        </div>
                        <div class="alert-content">
                            <h4>Invalid Input</h4>
                            <p>Please enter a valid SIM Number (e.g., 3001234567) or valid CNIC Number (e.g., 3135145489909)</p>
                        </div>
                    </div>
                @else
                    @forelse ($data as $index => $item)
                        <div class="modern-result-card">
                            <div class="result-card-header">
                                <div class="result-number">
                                    <span class="number-badge">#{{ $index + 1 }}</span>
                                    <h3>Search Result</h3>
                                </div>
                                <button class="modern-copy-btn" data-index="{{ $index }}">
                                    <i class="bi bi-clipboard"></i>
                                    <span>Copy</span>
                                </button>
                            </div>

                            <div class="result-details-grid">
                                <div class="detail-item">
                                    <div class="detail-icon">
                                        <i class="bi bi-phone"></i>
                                    </div>
                                    <div class="detail-content">
                                        <label>Mobile Number</label>
                                        <span class="detail-value">{{ $item['MobileNo'] }}</span>
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="detail-content">
                                        <label>Name</label>
                                        <span class="detail-value">{{ $item['NAME'] }}</span>
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-icon">
                                        <i class="bi bi-card-text"></i>
                                    </div>
                                    <div class="detail-content">
                                        <label>CNIC</label>
                                        <span class="detail-value">{{ $item['CNIC'] }}</span>
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div class="detail-content">
                                        <label>Address</label>
                                        <span class="detail-value">{{ $item['ADDRESS'] }}</span>
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-icon">
                                        <i class="bi bi-building"></i>
                                    </div>
                                    <div class="detail-content">
                                        <label>Operator</label>
                                        @php
                                            $operatorMap = [
                                                'j' => 'Jazz',
                                                'w' => 'Jazz/Warid',
                                                'jw' => 'Jazz/Warid',
                                                'wt' => 'Jazz/Warid',
                                                't' => 'Telenor',
                                                'z' => 'Zong',
                                                'u' => 'Ufone'
                                            ];
                                            $operator = $operatorMap[$item['op']] ?? $item['op'];
                                        @endphp
                                        <span class="detail-value operator-badge">{{ $operator }}</span>
                                    </div>
                                    
                                </div>
                                @if($AssociatedNumbers)
                                <div class="detail-item">
                                    <div class="detail-icon">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="detail-content">
                                        <label>Associated Numbers</label>
                                        <span class="detail-value">{{ implode(', ', $AssociatedNumbers) }}</span>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <!-- Hidden div to store record text -->
                            <div id="record-{{ $index }}" class="d-none">
                                Mobile #: {{ $item['MobileNo'] }}  
                                Name: {{ $item['NAME'] }}  
                                CNIC: {{ $item['CNIC'] }}  
                                Address: {{ $item['ADDRESS'] }}  
                                Operator: {{ $operator }}
                                @if($AssociatedNumbers)
                                Associated Numbers: {{ implode(', ', $AssociatedNumbers) }}
                                @endif
                                Collected from: {{ config('app.url') }}
                            </div>
                        </div>
                    @empty
                        <div class="modern-alert-warning">
                            <div class="alert-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div class="alert-content">
                                <h4>No Results Found</h4>
                                <p>No records found for your search query. Please try a different number or CNIC.</p>
                            </div>
                        </div>
                    @endforelse
                @endif

                <!-- Modern Action Buttons -->
                <div class="modern-action-buttons">
                    <a href="{{ url()->previous() }}" class="modern-search-again-btn">
                        <i class="bi bi-search"></i>
                        <span>Search Another Number</span>
                    </a>
                    
                    <a href="https://admin.pakbills.com/app-numbers/redirect" 
                       class="modern-chat-btn" 
                       target="_blank">
                        <i class="bi bi-chat-dots"></i>
                        <span>Chat with Admin</span>
                    </a>
                </div>

                <!-- Modern Features Showcase -->
                <div class="modern-features-showcase mb-5">
                    <div class="showcase-content">
                        <h3 class="showcase-title">What You Get</h3>
                        <div class="features-grid">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="bi bi-person-check"></i>
                                </div>
                                <span>Name & Address</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="bi bi-card-list"></i>
                                </div>
                                <span>CNIC Details</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="bi bi-clock-history"></i>
                                </div>
                                <span>Up-to-Date</span>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="bi bi-database"></i>
                                </div>
                                <span>Latest Database</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
// Copy functionality
document.querySelectorAll('.modern-copy-btn').forEach(button => {
    button.addEventListener('click', function() {
        const index = this.getAttribute('data-index');
        const recordText = document.getElementById(`record-${index}`).textContent;
        
        navigator.clipboard.writeText(recordText).then(() => {
            // Change button text temporarily
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="bi bi-check"></i><span>Copied!</span>';
            this.classList.add('copied');
            
            setTimeout(() => {
                this.innerHTML = originalText;
                this.classList.remove('copied');
            }, 2000);
        });
    });
});

// Add smooth animations
document.addEventListener('DOMContentLoaded', function() {
    const resultCards = document.querySelectorAll('.modern-result-card');
    const featureItems = document.querySelectorAll('.feature-item');
    
    resultCards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('animate-in');
        }, index * 200);
    });
    
    featureItems.forEach((item, index) => {
        setTimeout(() => {
            item.classList.add('animate-in');
        }, index * 100);
    });
});
</script>
@endpush
