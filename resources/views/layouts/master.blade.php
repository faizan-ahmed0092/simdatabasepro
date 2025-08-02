<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
   <meta name="keywords" content="{{ $page->keywords ?? 'SIM Database Pro' }}" />
   <link rel="canonical" href="{{ url()->current() }}" />
   {{-- <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}"> --}}

    @php
        $googleAdScript = getGoogleAdScript();
    @endphp

    @if($googleAdScript)
    {!! $googleAdScript !!}
    @endif
    
    <!-- Preload critical resources -->
    <link rel="preload" href="{{ asset('assets/css/swiper-bundle.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    
    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
   @if (request()->routeIs('index'))
        <!-- Swiper CSS - Load asynchronously -->
        <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}" media="print" onload="this.media='all'">
        <noscript><link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}"></noscript>
    @endif
    
    <!-- Load Font Awesome asynchronously -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" media="print" onload="this.media='all'">
    
    <!-- Fallback for browsers that don't support async CSS loading -->
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    </noscript>
  
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
    @stack('css')
</head>
<body>

    @include('front.include.header')
    @yield('content')
   <div class="container py-5">
    @include('front.components.questions')
   @if(request()->routeIs('faqs'))
     @include('front.components.contactus')
    @endif
    
   </div>
<a href="https://admin.pakbills.com/app-numbers/redirect" target="_blank" class="whatsapp-admin-btn">
    <!-- WhatsApp SVG Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="whatsapp-icon" width="20" height="20" fill="currentColor">
        <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
    </svg>
    
    <span>WhatsApp For Paid Services</span>
    
    <!-- Pulse Animation Dot -->
    <span class="pulse-dot"></span>
</a>


   <footer class="footer_section">
    <div class="container">
        @include('front.include.footer')
    </div>
</footer>

    @vite(['resources/js/app.js', 'resources/js/custom.js'])
    
    <!-- Load jQuery and Bootstrap asynchronously -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    
    {{-- @if (!empty($page->schema))
        {!! $page->schema !!}
    @endif --}}

    @stack('js')
</body>
</html>