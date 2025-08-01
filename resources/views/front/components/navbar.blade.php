<nav class="navbar navbar-expand-lg navbar-light py-0 shadow-lg" style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); box-shadow: 0 4px 20px rgba(0,0,0,0.08); border-bottom: 1px solid rgba(0,0,0,0.05);">
    <div class="container">
        <a class="navbar-brand fw-bolder logo-text d-flex align-items-center" href="{{route('index')}}" style="transition: transform 0.3s ease;">
            <img src="{{ asset('images/logo_new.png') }}" width="70" alt="SIM Database Pro" class="hero-logo me-2" style="filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));">
            <span class="fs-4 text-primary fw-bold" style="text-shadow: 0 1px 2px rgba(0,0,0,0.1);">SIM Database Pro</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation" style="box-shadow: none;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-lg-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
                <li class="nav-item me-1">
                    <a class="nav-link text-md-start text-center fw-semibold position-relative" aria-current="page" href="{{route('index')}}" 
                       style="color: #495057; transition: all 0.3s ease; padding: 0.75rem 1rem; border-radius: 8px;">
                        <span class="position-relative z-1">Home</span>
                        <span class="nav-link-underline" style="position: absolute; bottom: 0; left: 50%; width: 0; height: 2px; background: linear-gradient(90deg, #007bff, #0056b3); transition: all 0.3s ease; transform: translateX(-50%);"></span>
                    </a>
                </li>
                @foreach(getPages('Navbar') as $page)
                <li class="nav-item me-3">
                    <a href="{{route('page',$page->slug)}}" class="nav-link text-md-start text-center fw-semibold position-relative" 
                       style="color: #495057; transition: all 0.3s ease; padding: 0.75rem 1rem; border-radius: 8px;">
                        <span class="position-relative z-1">{{$page->short_title}}</span>
                        <span class="nav-link-underline" style="position: absolute; bottom: 0; left: 50%; width: 0; height: 2px; background: linear-gradient(90deg, #007bff, #0056b3); transition: all 0.3s ease; transform: translateX(-50%);"></span>
                    </a>
                </li>
                @endforeach
               
                <li class="nav-item ms-2">
                    <a class="cta-button-modern rounded" href="{{route('services')}}">Services</a>
                </li>
              
            </ul>
        </div>
    </div>
</nav>

<style>
.navbar-brand:hover {
    transform: scale(1.05);
}

.nav-link:hover {
    color: #007bff !important;
    background-color: rgba(0,123,255,0.05);
}

.nav-link:hover .nav-link-underline {
    width: 80% !important;
}

.cta-button-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,123,255,0.4) !important;
    background: linear-gradient(135deg, #0056b3 0%, #004085 100%) !important;
}

.navbar-nav .nav-link.active {
    color: #007bff !important;
    background-color: rgba(0,123,255,0.1);
}

.navbar-nav .nav-link.active .nav-link-underline {
    width: 80% !important;
}

@media (max-width: 991.98px) {
    .navbar-nav {
        padding: 1rem 0;
    }
    
    .nav-item {
        margin: 0.5rem 0;
    }
    
    .cta-button-modern {
        margin-top: 1rem;
        text-align: center;
    }
}
</style>