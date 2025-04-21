<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('admin/assets/vendor/owl-carousel/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/assets/vendor/owl-carousel/css/owl.theme.default.min.css')}}">
        <link href="{{asset('admin/assets/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
        <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet">
        @yield('header_links')
    </head>
    <body>

        <!-- Preloader start -->
            <div id="preloader">
                <div class="sk-three-bounce">
                    <div class="sk-child sk-bounce1"></div>
                    <div class="sk-child sk-bounce2"></div>
                    <div class="sk-child sk-bounce3"></div>
                </div>
            </div>
        <!-- Preloader end -->

        <!-- Main wrapper start -->
            <div id="main-wrapper">
                <!-- Nav header start -->
                    <div class="nav-header">
                        <a href="/admin/dashboard" class="brand-logo">Admin Panel
                            <img class="logo-abbr" src="{{asset('admin/assets/images/logo/Logo_Horizontal.png')}}" alt="">
                        </a>
                        <div class="nav-control">
                            <div class="hamburger">
                                <span class="line"></span><span class="line"></span><span class="line"></span>
                            </div>
                        </div>
                    </div>
                <!--  Nav header end -->
                <!--  Header start -->
                    <div class="header">
                        <div class="header-content">
                            <nav class="navbar navbar-expand">
                                <div class="collapse navbar-collapse justify-content-between">
                                    <div class="header-left">
                                        <div class="search_bar dropdown">
                                            <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                                <i class="mdi mdi-magnify"></i>
                                            </span>
                                            <div class="dropdown-menu p-0 m-0">
                                                <form>
                                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="navbar-nav header-right">
                                        <li class="nav-item dropdown header-profile">
                                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                                <i class="bi bi-person-circle"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="/admin/profile" class="dropdown-item">
                                                    <i class="icon-user"></i>
                                                    <span class="ml-2">Profile </span>
                                                </a>
                                                <form action="{{ route('admin.logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="icon-key"></i>
                                                        <span class="ml-2">Logout</span>
                                                    </button>
                                                </form>
                                                
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                <!--  Header end -->
                <!--  Sidebar start -->  
                    <div class="quixnav">
                        <div class="quixnav-scroll">
                            <ul class="metismenu" id="menu">
                                <li><a href="/admin/dashboard">Dashboard</a></li>
                                <li class="nav-label">Leads</li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-single-04"></i><span class="nav-text">Contact Us Leads</span></a>
                                    <ul aria-expanded="false">
                                        <li><a href="{{ route('admin.contacts.index') }}">View Contact Us Leads</a></li>
                                    </ul>
                                </li> 
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-single-04"></i><span class="nav-text">Career Leads</span></a>
                                    <ul aria-expanded="false">
                                        <li><a href="{{ route('admin.careers.index')}}">View Career Leads</a></li>
                                    </ul>
                                </li> 
                                <li class="nav-label">Customers</li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-single-04"></i><span class="nav-text">All Customers</span></a>
                                    <ul aria-expanded="false">
                                        <li><a href="fhfg">View/Manage Customers</a></li>
                                    </ul>
                                </li> 
                                <li class="nav-label">Header</li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-single-04"></i><span class="nav-text">Company Logo</span></a>
                                    <ul aria-expanded="false">
                                        <li><a href="/admin/header/add-company-logo">View/Add Logo</a></li>
                                    </ul>
                                </li> 
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-single-04"></i><span class="nav-text">Main menu</span></a>
                                    <ul aria-expanded="false">
                                        <li><a href="{{ route('admin.menus.manage')}}">View/Add Menu</a></li>
                                    </ul>
                                </li>
                                <li class="nav-label">Homepage</li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-app-store"></i><span class="nav-text">Posts</span></a>
                                    <ul aria-expanded="false">
                                        <li><a href="/admin/post/add-post">Add Post</a></li>
                                        <li><a href="/admin/post/all-posts">All Posts</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-app-store"></i><span class="nav-text">Services</span></a>
                                    <ul aria-expanded="false">
                                        <li><a href="/admin/add-service">View/Add Service</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-chart-bar-33"></i><span class="nav-text">Counter</span></a>
                                    <ul aria-expanded="false">
                                        <li><a href="/admin/add-counter">View/Add Counter</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-chart-bar-33"></i><span class="nav-text">FAQS</span></a>
                                    <ul aria-expanded="false">
                                        <li><a href="/admin/add-faq">View/Add Faq</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-chart-bar-33"></i><span class="nav-text">Our Partners</span></a>
                                    <ul aria-expanded="false">
                                        <li><a href="/admin/add-partner">View/Add Partner</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-chart-bar-33"></i><span class="nav-text">Our Teams</span></a>
                                    <ul aria-expanded="false">
                                        <li><a href="/admin/add-team-member">View/Add Team Member</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-chart-bar-33"></i><span class="nav-text">Testimonials</span></a>
                                    <ul aria-expanded="false">
                                        <li><a href="/admin/add-testimonial">View/Add Testimonial</a></li>
                                    </ul>
                                </li>
                                <li class="nav-label">Footer</li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-world-2"></i><span class="nav-text">Contact Info</span></a>
                                    <ul aria-expanded="false">
                                        <li><a href="/admin/footer/add-contact-info">View/Add Contact Info</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-plug"></i><span class="nav-text">Social Media Links</span></a>
                                    <ul aria-expanded="false">
                                        <li><a href="/admin/footer/social-media/add-link">View/Add Social Media Link</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                <!--  Sidebar end -->
                <!--  Content body start -->
                    <div class="content-body">
                        <!-- main content -->
                            @yield('main_content')
                        <!-- main content end -->
                    </div>
                <!--  Content body end -->
            </div>
        <!-- Main wrapper end -->    

        <!--  Footer start -->
            <div class="footer">
                <div class="copyright">
                    <p>Copyright © Designed &amp; Developed by <a href="/admin/dashboard">PctPay</a> 2025</p> 
                </div>
            </div>
        <!--  Footer end -->

        <!--  Scripts -->
            <script src="{{asset('admin/assets/vendor/global/global.min.js')}}"></script>
            <script src="{{asset('admin/assets/js/quixnav-init.js')}}"></script>
            <script src="{{asset('admin/assets/js/custom.min.js')}}"></script>
            <script src="{{asset('admin/assets/vendor/raphael/raphael.min.js')}}"></script>
            <script src="{{asset('admin/assets/vendor/morris/morris.min.js')}}"></script>
            <script src="{{asset('admin/assets/vendor/circle-progress/circle-progress.min.js')}}"></script>
            <script src="{{asset('admin/assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>
            <script src="{{asset('admin/assets/vendor/gaugeJS/dist/gauge.min.js')}}"></script>
            <script src="{{asset('admin/assets/vendor/flot/jquery.flot.js')}}"></script>
            <script src="{{asset('admin/assets/vendor/flot/jquery.flot.resize.js')}}"></script>
            <script src="{{asset('admin/assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>
            <script src="{{asset('admin/assets/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
            <script src="{{asset('admin/assets/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
            <script src="{{asset('admin/assets/vendor/jquery.counterup/jquery.counterup.min.js')}}"></script>
            <script src="{{asset('admin/assets/js/dashboard/dashboard-1.js')}}"></script>
        <!--  Scripts end-->

        @yield('footer_links')
    </body>
</html>