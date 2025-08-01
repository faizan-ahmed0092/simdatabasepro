@extends('admin.layout.app')
@section('title','Dashboard')
@push('css')
@endpush
@section('content')
<div class="app-content content position-relative">
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
                                <h4 class="card-title">Page</h4>
                            </div>
                            <div class="card-body mt-2">
                                <form action="{{route('admin.pages.store')}}" method="POST" id="myForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="bold">Page H1</label>
                                                <input type="text" required value="" name="page_heading"
                                                    class="form-control" placeholder="Page heading">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="bold">Title</label>
                                                <input type="text" required value="" name="title"
                                                    class="form-control generateSlug" placeholder="Title">
                                            </div>
                                        </div>
                                        
                                       <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="bold">Short Title</label>
                                                <input type="text" value="" name="short_title"
                                                    class="form-control" placeholder="Short Title">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 mt-1">
                                            <div class="form-group">
                                                <label>Slug</label>
                                                <input type="text" required value="" name="slug"
                                                    class="form-control slug_string" placeholder="Slug">
                                            </div>
                                        </div>

                                        
                                        <div class="col-lg-6 mt-1">
                                            <div class="form-group">
                                                <label>Display Location</label>

                                                <select name="appearance_type" class="form-control select2" required>
                                                    <option value="">Select Location</option>
                                                    @foreach(appearanceType() as $app)
                                                    <option value="{{$app}}">{{$app}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            <div class="form-group">
                                                <label>Schema</label>
                                                <textarea name="schema" rows="4" class="form-control" placeholder="Enter schema JSON or script here"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            <div class="form-group">
                                                <label>Keywords</label>
                                                <textarea name="keywords" rows="4" class="form-control" placeholder="Enter comma-separated keywords here"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            <div class="form-group">
                                                <label>Meta Description</label>
                                                <textarea rows="4" name="meta_description" class="form-control w-100"
                                                    placeholder="Description"></textarea>
                                            </div>
                                        </div>
                                       
                                        <div class="col-lg-12 mt-2">
                                            <div class="form-group ">
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
<input type="text" class="d-none" id="myInput">

@endsection

@push('js')

@endpush
