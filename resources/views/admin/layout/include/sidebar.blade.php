<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="">
                    <span
                        class="brand-logo">
                    </span>
                    <img src="" style="width:38px">
                    <h2 class="brand-text" style="margin-top:0px">Simdatabasepro</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="@if(url()->current() == route('admin.dashboard')) active @endif nav-item"><a
                    class="d-flex align-items-center" href="{{ route('admin.dashboard') }}">
                    <i data-feather="home"></i>Dashboard</a>
            </li>
            {{-- @can('Users')
            <li class="  nav-item">
                <a class="d-flex align-items-center" href="#"><i
                                    data-feather="circle"></i>Users</a>
                <ul class="menu-content">
                    @can('Users_List')
                    <li class="@if(url()->current() == route('admin.user.list')) active @endif nav-item"><a
                            class="d-flex align-items-center" href="{{ route('admin.user.list') }}">
                            <i data-feather="circle"></i>List</a>
                    </li>
                    @endcan
                   
                    @can('Users_Status')
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i>Status</a>
                        <ul class="menu-content">
                            @foreach(userStatuses() as $status)
                            <li class="@if(url()->current() == route('admin.user.status', $status)) active @endif">
                                <a class="d-flex align-items-center text-capitalize" href="{{ route('admin.user.status', $status) }}">
                                    <i data-feather="circle"></i> {{$status == 'ban' ? 'banned' : $status}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endcan
                    @can('Referral_Users')
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i>Referral Users</a>
                        <ul class="menu-content">
                            @foreach(userReferalTypes() as $referalType)
                            <li class="@if(url()->current() == route('admin.user.list', $referalType)) active @endif">
                                <a class="d-flex align-items-center text-capitalize" href="{{ route('admin.user.list', $referalType) }}">
                                    <i data-feather="circle"></i> {{$referalType}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endcan
                </ul>
            </li> --}}
            <li class="@if(url()->current() == route('admin.pages.index')) active @endif"><a
                class="d-flex align-items-center" href="{{ route('admin.pages.index') }}"><i
                    data-feather="circle"></i> Pages</a>
            </li>
            <li class="@if(url()->current() == route('admin.setting.index')) active @endif"><a
                class="d-flex align-items-center" href="{{ route('admin.setting.index') }}"><i
                    data-feather="circle"></i> Setting</a>
            </li>
        </ul>
    </div>
</div>
