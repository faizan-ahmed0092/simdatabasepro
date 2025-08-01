@extends('layouts.master')
@section('title', 'SIM Database Pro - Blog')
@section('description', "blog")
@push('css')
@endpush

@section('content')
<div class="container mt-5">
    
    <div class="row ">
        <div class="col-12 text-center mb-5">
            <h2 class="display-4 fw-bolder">
               Blog Posts
            </h2>
        </div>
        @foreach($items as $item)
         <div class="col-xl-4 col-md-6 col-12 my-3">
          <div class="card h-100 shadow-sm border-primary-subtle p-3">
            <div class="card-body">
              <h5 class="card-title text-primary fw-bold">
                {{ $item->title }}
              </h5>
              <p class="card-text text-muted">
                {{ \Illuminate\Support\Str::words($item->meta_description, 20, '...') }}
              </p>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center bg-white border-0">
             <a href="{{route('page',$item->slug)}}" class="text-primary fw-medium text-decoration-none">
                Read More →
            </a>
              <small class="text-muted">{{ \Carbon\Carbon::parse($item->created_at)->format('d M y')  }}</small>
            </div>
          </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('js')
@endpush