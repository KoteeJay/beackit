<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('home.index') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/logo.png') }}"  alt="logo"> 
            <span class="d-none d-lg-block" style="color: #0099ff; margin: -8px; padding-top: 5px;">eack</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->

    <livewire:search-box />
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        
    @auth
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <!-- End Search Icon-->

            <!-- End Notification Nav -->
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ auth()->user()->profile_photo_path ? asset('storage/' . auth()->user()->profile_photo_path) : asset('default-profile.png') }}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">    {{ auth()->user()->name }}
                    </span>
                </a>
                <!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>    {{ auth()->user()->name }}         </h6>
                        
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    @auth
                        @if(auth()->user()->user_type !== 'user')
                            <li>
                                <a href="{{ route('dashboard') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="bi bi-person"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                        @endif
                    @endauth
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none"> @csrf</form>
                        <a class="dropdown-item d-flex align-items-center" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul>
                <!-- End Profile Dropdown Items -->
            </li> 
    @else
            <a href="{{ route('dashboard')}}" class="btn btn-primary mx-4">Login</a>

    @endauth
           
            <!-- End Profile Nav -->

        </ul>
    </nav>
    <!-- End Icons Navigation -->

</header>