<div class="row">
    <div class="col-12 d-flex justify-content-center">
             <a class="navbar-brand fw-bolder my-4 display-4 d-md-none d-flex logo-text text-white" href="{{route('index')}}">SIM<span class="text_site">Database Pro</span></a>
    </div>
</div>
<hr class="hr-footer nav-vertical-bar">
<div class="row  justify-content-between">
    <div class="col-md-4  justify-content-center">
        <div class="ftco-footer-widget mb-4 ml-md-5 text-md-start text-center">
            <a class="navbar-brand fw-bolder logo-text my-4 display-4 d-md-flex d-none text-white" href="{{route('index')}}">SIM<span class="text_site">Database Pro</span></a>
            <div class="row">
                <p class="mb-0 footer_copy text-white-50 text-justify">SIM Database Pro offers a comprehensive live tracker tool, providing important information for any SIM number quickly along with its location details.</p>
            </div>
        </div>
    </div>
    <div class="col-md-2 d-flex justify-content-md-center justify-content-start">
        <div class="ftco-footer-widget mb-4 ml-md-5 text-md-start">
            <h4 class="ftco-heading-2 text-white text-md-start fw-bolder">Usefull Links</h4>
            <ul class="px-md-0 text-white">
                @foreach(getPages('Usefull Links') as $page)
                <li ><a href="{{route('page',$page->slug)}}" class=" d-block text-decoration-none text-white text-primary-hover text-capitalize">{{$page->short_title ?? $page->title}}</a></li>
                @endforeach
                <li ><a href="{{route('faqs')}}" class=" d-block text-decoration-none text-white text-primary-hover text-capitalize">FAQs</a></li>
                <li ><a href="{{route('blog')}}" class=" d-block text-decoration-none text-white text-primary-hover text-capitalize">Blog</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-2 d-flex justify-content-md-center justify-content-start">
        <div class="ftco-footer-widget mb-4 ml-md-5 text-start">
            <h4 class="ftco-heading-2 text-white text-start   fw-bolder">Articles</h4>
            <ul class="px-md-0 text-white">
                @foreach(getPages('Articles') as $page)
                <li ><a href="{{route('page',$page->slug)}}" class=" d-block text-decoration-none text-white text-primary-hover text-capitalize">{{$page->short_title ?? $page->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-2 d-flex justify-content-md-center justify-content-start">
        <div class="ftco-footer-widget mb-4 ml-md-5 text-start">
            <h4 class="ftco-heading-2 text-white text-start text-start  fw-bolder">Latest Article </h4>
            <ul class="px-md-0 text-white">
                @foreach(getPages('Latest Article') as $page)
                <li ><a href="{{route('page',$page->slug)}}" class=" d-block text-decoration-none text-white text-primary-hover text-capitalize">{{$page->short_title ?? $page->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    
</div>
<hr class="hr-footer nav-vertical-bar"hr>
<div class="row align-items-center flex-md-row flex-column-reverse">
    <div class=" col-12 d-flex justify-content-center mt-md-0 mt-2">
        <div class=" Copyright-Very-Fr text-white">
            <p class="mb-0">© 2021 - {{now()->format('Y')}} <span id="copyrightText">SIM Database Pro.</span> {{$setting['copyright_text'] ?? 'All rights reserved.'}}</p>
        </div>
    </div>
</div>