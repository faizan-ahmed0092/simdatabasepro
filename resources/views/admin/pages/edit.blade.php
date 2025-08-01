@extends('admin.layout.app')
@section('title','Dashboard')
@push('css')
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
                                <h4 class="card-title text-capitalize">Page - {{$item->title}}</h4>
                            </div>
                            <div class="card-body mt-2">
                                <form action="{{route('admin.pages.update', $item->id)}}" method="POST" enctype="multipart/form-data" id="myForm">
                                    @csrf
                                    <div class="row">
                                        <div class="{{$item->appearance_type != 'Usefull Links' ? "col-lg-12" : 'col-lg-6'}}">
                                            <div class="form-group">
                                                <label class="bold">Page H1</label>
                                                <input type="text" required value="{{$item->page_heading}}" name="page_heading"
                                                    class="form-control" placeholder="Page heading">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="bold">Title</label>
                                                <input type="text" required value="{{$item->title}}" name="title"
                                                    class="form-control generateSlug" placeholder="Title">
                                            </div>
                                        </div>
                                      
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="bold">Short Title</label>
                                                <input type="text" value="{{$item->short_title ?? ''}}" name="short_title"
                                                    class="form-control" placeholder="Short Title">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            <div class="form-group">
                                                <label>Slug</label>
                                                <input type="text" required value="{{$item->slug}}" name="slug"
                                                    class="form-control slug_string" placeholder="Slug">
                                            </div>
                                        </div>
                                        @if($item->appearance_type != 'Usefull Links')
                                        <div class="col-lg-6 mt-1">
                                            <div class="form-group">
                                                <label>Display Location</label>

                                                <select name="appearance_type" class="form-control select2" required>
                                                    <option value="">Select Location</option>
                                                    @foreach(appearanceType() as $app)
                                                    <option {{$item->appearance_type == $app ? 'selected' : ''}} value="{{$app}}">{{$app}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-lg-6 mt-1">
                                            <div class="form-group">
                                                <label>Schema</label>
                                                <textarea name="schema" rows="4" class="form-control" placeholder="Enter schema here">{!! $item ? $item->schema : '' !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            <div class="form-group">
                                                <label>Keywords</label>
                                                <textarea name="keywords" rows="4" class="form-control" placeholder="Enter keywords here">{!! $item ? $item->keywords : '' !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-1">
                                            <div class="form-group">
                                                <label>Meta Description</label>
                                                <textarea rows="4" name="meta_description" class="form-control w-100"
                                                    placeholder="Description">{!! $item ? $item->meta_description : '' !!}</textarea>
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
@endsection

@push('js')
@endpush
