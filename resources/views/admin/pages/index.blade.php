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
                                <div class="">
                                    <a  href="{{route('admin.pages.create')}}" class="btn btn-primary" >Add</a>
                                </div>
                            </div>
                            <div class="card-body mt-2">
                                {{-- <div class="table-responsive">
                                    {{ $dataTable->table(['class' => 'table text-center table-striped w-100'],true) }}
                                </div> --}}
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Page Heading</th>
                                            <th>slug</th>
                                            {{-- <th>meta_description</th> --}}
                                            <th>appearance_type</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($list as $item)
                                        <tr>
                                            <td>
                                                {{$item->title}}
                                            </td>
                                            <td>
                                                {{$item->page_heading}}
                                            </td>
                                            <td>{{$item->slug}}</td>
                                            {{-- <td>{{$item->meta_description}}</td> --}}
                                            <td>{{$item->appearance_type}}</td>
                                            {{-- <td><span class="badge rounded-pill badge-light-primary me-1">{{$item->status == '1' ? 'On' : 'Off'}}</span>
                                            </td> --}}
                                            {{-- <form action="{{route('admin.pages.status',{{$item-id}})}}">
                                                <input type="hidden" name="status" value="{{$item->status}}">
                                            </form> --}}
                                                <a class="d-none my_{{ $item->id }} btn btn-primary" href="{{route('admin.pages.status',$item->id)}}"></a>
                                            <td><div class="form-check form-switch">
                                                <input class="form-check-input chekbox_status_change m-auto" data-id="{{$item->id}}" type="checkbox" role="switch" {{$item->status == '1' ? 'checked' : ''}}>
                                              </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{route('admin.pages.design', $item->id)}}" title="Design" class=" dropdown-item btn btn-warning w-50p text-center">
                                                        <i class="fa fa-palette mr-50"></i>
                                                    </a>
                                                    <a href="{{route('admin.pages.edit', $item->id)}}" title="Edit" class="mx-1 dropdown-item btn btn-primary w-50p text-center">
                                                        <i class="fa fa-edit mr-50"></i>
                                                    </a>
                                                   @if($item->appearance_type != 'Usefull Links')
                                                     <form action="{{ route('admin.pages.delete', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this page?')" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item delete-btn btn btn-danger w-50p mr-10p text-center">
                                                             <i class="fa fa-trash mr-50"></i>
                                                        </button>
                                                    </form>
                                                    @endif
                                                </div>
                                                {{-- <div class="dropdown">
                                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                    </button>
                                                    
                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                        <a class="dropdown-item" href="{{route('admin.pages.edit', $item->id)}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 me-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                            <span>Edit</span>
                                                        </a>
                                                        <a class="dropdown-item" href="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash me-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                            <span>Delete</span>
                                                        </a>
                                                    </div>
                                                </div> --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
<script>
    $(document).on("change", ".chekbox_status_change", function () {
        var itemId = $(this).attr('data-id');
        var className = '.my_' + itemId;
        window.location.href = $(className).attr('href');
    });
</script>
@endpush
