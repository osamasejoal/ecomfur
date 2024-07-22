<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('backend/assets') }}/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/assets') }}/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('backend/assets') }}/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/assets') }}/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('home.admin') }}">
                        <i data-feather="home" class="icon-dual"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li> <!-- end Dashboard -->

                <!-- Categories -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('category.view') }}">
                        <i data-feather="grid" class="icon-dual"></i> <span>Categories</span>
                    </a>
                </li> <!-- end Categories -->

                <!-- Products -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('product.view') }}">
                        <i class="mdi mdi-bed-king-outline"></i> <span>Products</span>
                    </a>
                </li> <!-- end Products -->

                <!-- Variant Box -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarPages">
                        <i class="lab las la-shapes"></i> <span data-key="t-pages">Variant Box</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">

                            <!-- Variants -->
                            <li class="nav-item">
                                <a href="{{ route('variant.view') }}" class="nav-link" data-key="t-starter"> Variants </a>
                            </li>

                            <!-- Colors -->
                            <li class="nav-item">
                                <a href="{{ route('color.view') }}" class="nav-link" data-key="t-starter"> Colors </a>
                            </li>

                            <!-- Sizes -->
                            <li class="nav-item">
                                <a href="{{ route('size.view') }}" class="nav-link" data-key="t-starter"> Sizes </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Variant -->

                <!-- About -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('about.view') }}">
                        <i data-feather="book-open" class="icon-dual"></i> <span>About</span>
                    </a>
                </li> <!-- end About -->

                <!-- Testimonials -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('testimonial.view') }}">
                        <i class="mdi mdi-comment-quote-outline"></i> <span>Testimonials</span>
                    </a>
                </li> <!-- end Testimonials -->

                <!-- Supporters -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('supporter.view') }}">
                        <i class="lab las la-handshake"></i> <span>Supporters</span>
                    </a>
                </li> <!-- end Supporters -->

                <!-- Coupons -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('coupon.view') }}">
                        <i class="lab las la-tags"></i> <span>Coupons</span>
                    </a>
                </li> <!-- end Coupons -->

                <!-- Reviews -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('review.view') }}">
                        <i class="lab las la-sms"></i> <span>Reviews</span>
                    </a>
                </li> <!-- end Reviews -->

                <!-- Widgets -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i data-feather="copy" class="icon-dual"></i> <span data-key="t-widgets">Widgets</span>
                    </a>
                </li> <!-- end widgets -->

                <!-- Multi-level -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#frontend" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="frontend">
                        <i class="lab las la-image"></i> <span data-key="frontend">Frontend</span>
                    </a>
                    <div class="collapse menu-dropdown" id="frontend">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('SliderImage.view') }}" class="nav-link" data-key="slider-image"> Slider Image </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Multi-level -->

                <!-- Multi-level -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarMultilevel">
                        <i data-feather="share-2" class="icon-dual"></i> <span data-key="t-multi-level">Multi
                            Level</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-level-1.1"> Level 1.1 </a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2">
                                    Level 1.2
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarAccount">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-key="t-level-2.1"> Level 2.1 </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebarCrm" class="nav-link" data-bs-toggle="collapse"
                                                role="button" aria-expanded="false" aria-controls="sidebarCrm"
                                                data-key="t-level-2.2"> Level 2.2
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebarCrm">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link" data-key="t-level-3.1">
                                                            Level 3.1 </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link" data-key="t-level-3.2">
                                                            Level 3.2 </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Multi-level -->
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
