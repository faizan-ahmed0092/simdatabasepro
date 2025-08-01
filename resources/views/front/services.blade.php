@extends('layouts.master')
@section('title', "SIM Database Pro - Services")
@section('description', "services")
@push('css')

@endpush

@section('content')
<div class="container">
    @include('front.components.services')
    @include('front.components.contactus')
</div>
@endsection

@push('js')
@endpush