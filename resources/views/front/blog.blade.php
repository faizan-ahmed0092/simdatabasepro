@extends('layouts.master')
@section('title', 'SIM Database Pro - Blog')
@section('description', "blog")
@push('css')
@endpush

@section('content')
<div class="blog-section">
    <div class="container">
        <div class="blog-header">
            <h1 class="blog-title">Blog Posts</h1>
            <p class="blog-subtitle">Stay updated with the latest insights and information</p>
        </div>
        
        <div class="blog-grid">
            @foreach($items as $item)
            <article class="blog-card">
                <div class="blog-card-header">
                    <span class="blog-badge">Blog</span>
                    <h2 class="blog-card-title">{{ $item->title }}</h2>
                </div>
                
                <div class="blog-card-body">
                    <p class="blog-card-description">
                        {{ \Illuminate\Support\Str::words($item->meta_description, 20, '...') }}
                    </p>
                </div>
                
                <div class="blog-card-footer">
                    <a href="{{route('page',$item->slug)}}" class="blog-read-more">
                        Read More
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    
                    <div class="blog-date">
                        <span class="blog-date-day">{{ \Carbon\Carbon::parse($item->created_at)->format('d') }}</span>
                        <span class="blog-date-month">{{ \Carbon\Carbon::parse($item->created_at)->format('M Y') }}</span>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush