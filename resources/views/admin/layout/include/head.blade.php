<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title') - SimDatabase</title>
    {{-- <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}"/> --}}
    
    <!-- Preconnect to external domains for faster loading -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Critical CSS - Inline essential styles -->
    <style>
        /* Prevent flash of unstyled content */
        body { 
            margin: 0; 
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            opacity: 0;
            transition: opacity 0.3s ease-in;
        }
        body.loaded { opacity: 1; }
        
        /* Critical CSS for above-the-fold content */
        .app-content { min-height: 100vh; }
        .content-wrapper { padding: 0; }
        .navbar { background: #fff; box-shadow: 0 2px 4px rgba(0,0,0,.1); }
        .card { background: #fff; border-radius: 0.428rem; box-shadow: 0 4px 24px 0 rgba(34, 41, 47, 0.1); }
        .btn { display: inline-block; padding: 0.786rem 1.5rem; border-radius: 0.358rem; text-decoration: none; }
        .btn-primary { background-color: #7367f0; border-color: #7367f0; color: #fff; }
        .form-control { display: block; width: 100%; padding: 0.438rem 1rem; border: 1px solid #d8d6de; border-radius: 0.357rem; }
        .table { width: 100%; margin-bottom: 1rem; border-collapse: collapse; }
        .table th, .table td { padding: 0.75rem; border-top: 1px solid #dee2e6; }
        
        /* Hide non-critical content initially */
        .async-content { opacity: 0; transition: opacity 0.3s; }
        .async-content.loaded { opacity: 1; }
    </style>
    
    <!-- Load Google Fonts asynchronously -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600&display=swap" rel="stylesheet"></noscript>

    <!-- Critical CSS - Load only essential styles immediately -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/colors.css')}}">

    <!-- Semi-critical CSS - Load with high priority but async -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/vendors.min.css')}}" media="print" onload="this.media='all'">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap-extended.css')}}" media="print" onload="this.media='all'">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/components.css')}}" media="print" onload="this.media='all'">

    <!-- Non-critical CSS - Load asynchronously -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/charts/apexcharts.css')}}" media="print" onload="this.media='all'">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/extensions/toastr.min.css')}}" media="print" onload="this.media='all'">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/themes/dark-layout.css')}}" media="print" onload="this.media='all'">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/themes/bordered-layout.css')}}" media="print" onload="this.media='all'">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/themes/semi-dark-layout.css')}}" media="print" onload="this.media='all'">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/core/menu/menu-types/vertical-menu.css')}}" media="print" onload="this.media='all'">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/pages/dashboard-ecommerce.css')}}" media="print" onload="this.media='all'">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/plugins/charts/chart-apex.css')}}" media="print" onload="this.media='all'">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/plugins/extensions/ext-component-toastr.css')}}" media="print" onload="this.media='all'">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/fonts/font-awesome/css/font-awesome.css')}}" media="print" onload="this.media='all'">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/select/select2.min.css')}}" media="print" onload="this.media='all'">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}" media="print" onload="this.media='all'">
    
    <!-- Fallback for browsers that don't support async CSS loading -->
    <noscript>
        <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/vendors.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap-extended.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/css/components.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/charts/apexcharts.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/extensions/toastr.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/css/themes/dark-layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/css/themes/bordered-layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/css/themes/semi-dark-layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/css/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/css/pages/dashboard-ecommerce.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/css/plugins/charts/chart-apex.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/css/plugins/extensions/ext-component-toastr.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/fonts/font-awesome/css/font-awesome.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/select/select2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
    </noscript>

    <!-- Load TinyMCE only when needed -->
    @stack('tinymce')

    <style>
       .hide{
        display:none;
    }
          .custom_badge{
            display: inline-block;
            padding: .25em .4em;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;

            color:white;
          }
          .action_buttons a{
              padding:7px;
          }
          .brand-text{
            color: #1459C3!important;
          }
          .create_task,.cursor-pointer{
            cursor:pointer;
          }
          .table thead th, .table tfoot th {
  text-transform: capitalize !important;
}
.fit-content{
  width:fit-content;
}
.min-w200p {
        min-width: 200px;
    }
.close{
    font-size: 30px;
  padding: 5px 10px;
}
.mr-5p{
  margin-right:5px;
}
.task_list_item, .project_list_item{
  cursor:pointer !important;
}
.select2-container--classic .select2-selection--single .select2-selection__arrow b, .select2-container--default .select2-selection--single .select2-selection__arrow b{
    background-image: url("{{asset('admin/images/downarrow.png')}}") !important;
    position: initial;
    border:none;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {

  top: 30% !important;
}
.error{
  color:red;
}
.card .card{
  box-shadow:0 4px 24px 0 rgba(34, 41, 47, 0.1) !important;
}
.image_selector{
  position: fixed;
  padding: 7px 14px;
    bottom: 25px;
    right: 25px;
    background-color: red;
    color: rgb(255, 255, 255);
    border-radius: 50px;
    text-align: center;
    font-size: 20px;
    z-index: 999999999;
    cursor:pointer;
}
label {
  font-weight: bold;
}
.chekbox_status{
  float:none !important;
}
.form-switch {
  padding: 0px !important;
}
#user-profile .profile-latest-img:hover {
  transform: translateY(-4px) scale(1.2);
  z-index: 10;
}
.hide-search > input{
  /* display : none !important; */
}
.myDIV:hover + .hide {
    position: fixed !important;
    z-index: 999 !important;
    display: flex;
}

/* table.dataTable thead .sorting::before, table.dataTable thead .sorting_asc::before, table.dataTable thead .sorting_desc::before, table.dataTable thead .sorting_asc_disabled::before, table.dataTable thead .sorting_desc_disabled::before {
  display:none !important;
}

table.dataTable thead .sorting::after, table.dataTable thead .sorting_asc::after, table.dataTable thead .sorting_desc::after, table.dataTable thead .sorting_asc_disabled::after, table.dataTable thead .sorting_desc_disabled::after{
display:none !important;
}
.sorting_asc{
cursor: auto !important;
} */
.modal {
  z-index: 9999999 !important;
}
       .same_height_row {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display:         flex;
  flex-wrap: wrap;
}
.same_height_row > [class*='col-md-6'] {
  display: flex;
  margin-bottom:10px;
}
.chartjs{
    min-height:400px;
    max-height:550px;
    min-width:400px;
}
.my_accordion {
  background-image: url('../../../../../images/home/arrow.svg');
  background-repeat: no-repeat;
  background-size: 30px 20px;
  background-position: right center;
  padding: 10px 22px;
//   border-bottom: 0.1px solid black;
}
.my_accordion_collapse{
    border-bottom: 0.1px solid black;
    padding: 10px 22px;
    display:none;
}
.accordion_show.my_accordion_collapse{
    display:block;
}
/* sipnner Center Spinner */
.sipnner {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.sipnner:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
    background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

  background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
}

/* :not(:required) hides these rules from IE9 and below */
.sipnner:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}
</style>