@extends('layouts.master')
@section('title', $page->title ?? "SIM Database Pro - Contact Us")
@section('description', $page->meta_description ?? "Contact US")
@push('css')

@endpush
@section('content')
 @include('front.components.contactus')
   
    
<div class="container mt-5">
   <div class="content_body ck_fix col-12">
        {!! $page->content ?? "" !!}
    </div>
</div>
@endsection

@push('js')


@endpush