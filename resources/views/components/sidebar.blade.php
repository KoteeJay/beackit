<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('home.index')}}">
                <i class="bi bi-home"></i>
                <span>Home</span>
            </a>
        </li>
        <!-- End Home Nav -->
       {{$slot }}
       

    </ul>
    <div class="available">
        <div class="card-body">
            <div class="filter">
                <a><i class="bi bi-three-dots"></i></a>

            </div>
            <h5 class="card-title">Available professionals <span> <br>| <aclass="icon" href="#" data-bs-toggle="dropdown">Coming soon</a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Ethical hacker</a></li>
                    <li><a class="dropdown-item" href="#">Penetration tester</a></li>
                    <li><a class="dropdown-item" href="#">Advisory specialists</a></li>
                </ul>
            </span></h5>

            <div class="activity">


                <div class="activity-item d-flex">
                </div>
                <!-- End activity item-->
                <a href="contact.html" class="btn btn-primary">Contact Us</a>
            </div>

        </div>
    </div>
</aside>