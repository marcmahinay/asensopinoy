<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <!-- Logo icon --><b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('storage/images/logo-icon.png') }}" style="width: 36px;" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="{{ asset('storage/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text --><span>
                    <!-- dark Logo text -->
                    <img src="{{ asset('storage/images/logo-text.png') }}"   style="padding-left:20px;"alt="homepage" class="dark-logo" />
                    <!-- Light Logo text -->
                    <img src="{{ asset('storage/images/logo-light-text.png') }}" class="light-logo" alt="homepage" /></span>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                        href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                @if (Route::is('member') || Route::is('member.*') || Route::is('barangay.show'))
                    <li class="nav-item hidden-xs-down search-box"> <a
                            class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i
                                class="fa fa-search"></i></a>
                        <form class="app-search" action="{{ route('member.search') }}" method="GET" >
                            <input type="text" name="query" class="form-control" placeholder="Search & enter"> <a
                                class="srh-btn"><i class="fa fa-times"></i></a>
                        </form>
                    </li>
                @endif
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#"
                        id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                            src="{{ asset(Auth::user()->image_path) }}" alt="user" class="" /> <span
                            class="hidden-md-down">{{ Auth::user()->name }} &nbsp;</span> </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
