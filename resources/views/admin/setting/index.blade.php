@extends('admin.layout.app')
@section('title','Dashboard')
@push('css')
<link rel="stylesheet" href="{{ asset('admin/assets/dashboard/css/dataTables.bootstrap4.min.css') }}" />
@endpush
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl pt-0 px-0 pb-sm-0 pb-5">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="row-grouping-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom d-flex justify-content-between">
                                <h4 class="card-title text-capitalize">Pages</h4>
                            </div>
                            <div class="card-body mt-2">
                                
                                
                                <form action="{{ route('admin.setting.store') }}" method="POST" id="myForm">
                                    @csrf
                                
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="bold">WhatsApp Number</label>
                                                <input type="text" required name="whatsapp_number" class="form-control"
                                                    value="{{ $number ?? '' }}" placeholder="+923334455666">
                                            </div>
                                        </div>
                                    </div>
                                
                                    <!-- Grid for Google Ad Snippet -->
                                    <div class="row my-3">
                                        <div class="col-12">
                                            <label for="af-account-email"
                                                class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                                Google Ad Snippet
                                            </label>
                                        </div>
                                        <div class="col-12">
                                            <textarea id="af-account-email" name="google_ad_script"
                                              class="form-control mb-3"
                                              placeholder="e.g: about" autocomplete="off">{{ $google_ad_script ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- End Grid -->
                                
                                    <div class="row">
                                        <div class="col-lg-12 mt-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="reset" class="btn btn-danger">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection

@push('js')
@endpush
