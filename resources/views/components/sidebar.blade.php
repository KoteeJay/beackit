<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav mt-5" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('home.index')}}">
                <i class="bi bi-home"></i>
                <span>Home</span>
            </a>
        </li>
        @auth
         @if(auth()->user()->user_type !== 'user')
         <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
            </li>
        @endif
        @endauth
        <!-- End Home Nav -->
       {{$slot }}
       

    </ul>
    <div class="available">
        <div class="card-body">
            
            <h5 class="card-title">Available professionals <span> <br>| Coming soon</span></h5>

            <div class="activity">

                <div class="activity-item d-flex">
                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                    <div class="activity-content">
                        <a href="#" class="fw-bold text-dark"> Noble</a> is available
                    </div>
                </div>
                <!-- End activity item-->

                <div class="activity-item d-flex">
                    <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                    <div class="activity-content">
                        <a href="#" class="fw-bold text-dark"> Chris</a> just left
                    </div>
                </div>
                <!-- End activity item-->
                <a href="{{ route('contact') }}" class="btn btn-primary mt-2">Contact Us</a>
            </div>

        </div>
    </div>
</aside>