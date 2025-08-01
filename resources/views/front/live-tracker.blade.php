@extends('layouts.master')
@section('title', $page->title)
@section('description', $page->meta_description ?? $page->title)
@push('css')

@endpush

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 bg-white border px-5 py-5 box-shadow rounded">
           
           
            <div class="row">
               
                <div class="col-12 bg_dark_liner rounded shadow-sm">
                    <h2 class="display-5 fw-bold text-center py-4 text-white">
                        Database Search
                    </h2>
                </div>
            
             
                <div class="col-12 mt-4">
                    <div class="card shadow-sm p-sm-4 border-0">
                        <form action="{{ route('result') }}" method="POST">
                            @csrf
                            <div class="row g-2">
                                <div class="col-12 col-md-9">
                                    <input  
                                        name="number"
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Enter Mobile Number or CNIC" 
                                        required>
                                </div>
                                <div class="col-12 col-md-3">
                                    <button class="btn btn-primary bg_dark_liner w-100" type="submit">
                                        <i class="bi bi-search"></i> Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            
                <div class="col-12 mt-5">
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="card text-center p-3 border-0 shadow-sm bg-light">
                                <i class="bi bi-person-check fs-1 text-primary"></i>
                                <p class="mt-2 fw-bold">Name and Address</p>
                            </div>
                        </div>
            
                        <div class="col-md-3">
                            <div class="card text-center p-3 border-0 shadow-sm bg-light">
                                <i class="bi bi-card-list fs-1 text-success"></i>
                                <p class="mt-2 fw-bold">CNIC Details</p>
                            </div>
                        </div>
            
                        <div class="col-md-3">
                            <div class="card text-center p-3 border-0 shadow-sm bg-light">
                                <i class="bi bi-calendar-check fs-1 text-warning"></i>
                                <p class="mt-2 fw-bold">Up-To-Date Records</p>
                            </div>
                        </div>
            
                        <div class="col-md-3">
                            <div class="card text-center p-3 border-0 shadow-sm bg-light">
                                <i class="bi bi-database fs-1 text-danger"></i>
                                <p class="mt-2 fw-bold">Latest Databases</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
     <div class="col-12">
         <h1 class="text-black display-4 fw-bolder text-center my-5">
            {{  $page->page_heading }}
        </h1>
    </div>
     <div class="content_body ck_fix col-12">
        {!! $page->content !!}
    </div>
</div>
@endsection

@push('js')
@endpush