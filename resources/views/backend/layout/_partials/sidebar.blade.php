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
                    <a href="{{ route('home.admin') }}"
                        class="nav-link menu-link
                    {{ request()->routeIs('home.admin') ? 'active' : '' }}">
                        <i data-feather="home" class="icon-dual"></i> <span data-key="dashboard">Dashboard</span>
                    </a>
                </li> <!-- end Dashboard -->

                <!-- Categories -->
                <li class="nav-item">
                    <a href="{{ route('category.view') }}"
                        class="nav-link menu-link
                    {{ request()->routeIs('category.view') ? 'active' : '' }}
                    {{ request()->routeIs('category.create') ? 'active' : '' }}
                    {{ request()->routeIs('category.edit') ? 'active' : '' }}">
                        <i data-feather="grid" class="icon-dual"></i> <span>Categories</span>
                    </a>
                </li> <!-- end Categories -->

                <!-- Products -->
                <li class="nav-item">
                    <a href="{{ route('product.view') }}"
                        class="nav-link menu-link 
                    {{ request()->routeIs('product.view') ? 'active' : '' }}
                    {{ request()->routeIs('product.create') ? 'active' : '' }}
                    {{ request()->routeIs('product.edit') ? 'active' : '' }}">
                        <i class="mdi mdi-bed-king-outline"></i> <span>Products</span>
                    </a>
                </li> <!-- end Products -->

                <!-- Variants -->
                <li class="nav-item">
                    <a href="{{ route('variant.view') }}" data-key="variants"
                        class="nav-link menu-link
                                {{ request()->routeIs('variant.view') ? 'active' : '' }}
                                {{ request()->routeIs('variant.create') ? 'active' : '' }}
                                {{ request()->routeIs('variant.edit') ? 'active' : '' }}">
                        <i class="lab las la-shapes"></i> <span data-key="variant-box">Variants</span>
                    </a>
                </li> <!-- end Variant -->

                <!-- About -->
                <li class="nav-item">
                    <a href="{{ route('about.view') }}"
                        class="nav-link menu-link
                    {{ request()->routeIs('about.view') ? 'active' : '' }}">
                        <i data-feather="book-open" class="icon-dual"></i> <span>About</span>
                    </a>
                </li> <!-- end About -->

                <!-- Testimonials -->
                <li class="nav-item">
                    <a href="{{ route('testimonial.view') }}"
                        class="nav-link menu-link
                    {{ request()->routeIs('testimonial.view') ? 'active' : '' }}
                    {{ request()->routeIs('testimonial.create') ? 'active' : '' }}
                    {{ request()->routeIs('testimonial.edit') ? 'active' : '' }}">
                        <i class="mdi mdi-comment-quote-outline"></i> <span>Testimonials</span>
                    </a>
                </li> <!-- end Testimonials -->

                <!-- Supporters -->
                <li class="nav-item">
                    <a href="{{ route('supporter.view') }}"
                        class="nav-link menu-link
                    {{ request()->routeIs('supporter.view') ? 'active' : '' }}
                    {{ request()->routeIs('supporter.create') ? 'active' : '' }}
                    {{ request()->routeIs('supporter.edit') ? 'active' : '' }}">
                        <i class="lab las la-handshake"></i> <span>Supporters</span>
                    </a>
                </li> <!-- end Supporters -->

                <!-- Coupons -->
                <li class="nav-item">
                    <a href="{{ route('coupon.view') }}"
                        class="nav-link menu-link
                    {{ request()->routeIs('coupon.view') ? 'active' : '' }}
                    {{ request()->routeIs('coupon.create') ? 'active' : '' }}
                    {{ request()->routeIs('coupon.edit') ? 'active' : '' }}">
                        <i class="lab las la-tags"></i> <span>Coupons</span>
                    </a>
                </li> <!-- end Coupons -->

                <!-- Reviews -->
                <li class="nav-item">
                    <a href="{{ route('review.view') }}"
                        class="nav-link menu-link
                    {{ request()->routeIs('review.view') ? 'active' : '' }}">
                        <i class="lab las la-sms"></i> <span>Reviews</span>
                    </a>
                </li> <!-- end Reviews -->

                <!-- Frontend -->
                <li class="nav-item">
                    <a href="#frontend" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="frontend"
                        class="nav-link menu-link
                        {{ request()->routeIs('SliderImage.view') ? 'active' : '' }}
                        {{ request()->routeIs('SliderImage.create') ? 'active' : '' }}
                        {{ request()->routeIs('SliderImage.edit') ? 'active' : '' }}
                        {{ request()->routeIs('service.view') ? 'active' : '' }}
                        {{ request()->routeIs('service.edit') ? 'active' : '' }}
                        {{ request()->routeIs('front.image.view') ? 'active' : '' }}
                        {{ request()->routeIs('front.image.edit') ? 'active' : '' }}
                        {{ request()->routeIs('com.info.view') ? 'active' : '' }}
                        {{ request()->routeIs('com.info.edit') ? 'active' : '' }}
                        {{ request()->routeIs('com.social.view') ? 'active' : '' }}
                        {{ request()->routeIs('com.social.edit') ? 'active' : '' }}">
                        <i class="lab las la-image"></i> <span data-key="frontend">Frontend</span>
                    </a>
                    <div class="collapse menu-dropdown" id="frontend">
                        <ul class="nav nav-sm flex-column">
                            <!-- Slider Images -->
                            <li class="nav-item">
                                <a href="{{ route('SliderImage.view') }}" data-key="slider-image"
                                    class="nav-link
                                {{ request()->routeIs('SliderImage.view') ? 'active' : '' }}
                                {{ request()->routeIs('SliderImage.create') ? 'active' : '' }}
                                {{ request()->routeIs('SliderImage.edit') ? 'active' : '' }}">
                                    Slider Images
                                </a>
                            </li>
                            <!-- Services -->
                            <li class="nav-item">
                                <a href="{{ route('service.view') }}" data-key="services"
                                    class="nav-link
                                {{ request()->routeIs('service.view') ? 'active' : '' }}
                                {{ request()->routeIs('service.edit') ? 'active' : '' }}">
                                    Services
                                </a>
                            </li>
                            <!-- Front Images -->
                            <li class="nav-item">
                                <a href="{{ route('front.image.view') }}" data-key="front-images"
                                    class="nav-link
                                {{ request()->routeIs('front.image.view') ? 'active' : '' }}
                                {{ request()->routeIs('front.image.edit') ? 'active' : '' }}">
                                    Front Images
                                </a>
                            </li>
                            <!-- Company Information -->
                            <li class="nav-item">
                                <a href="{{ route('com.info.view') }}" data-key="front-images"
                                    class="nav-link
                                {{ request()->routeIs('com.info.view') ? 'active' : '' }}
                                {{ request()->routeIs('com.info.edit') ? 'active' : '' }}">
                                    Company Information
                                </a>
                            </li>
                            <!-- Company Social Media -->
                            <li class="nav-item">
                                <a href="{{ route('com.social.view') }}" data-key="front-images"
                                    class="nav-link
                                {{ request()->routeIs('com.social.view') ? 'active' : '' }}
                                {{ request()->routeIs('com.social.edit') ? 'active' : '' }}">
                                    Social Media
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Frontend -->

                <!-- Widgets -->
                <li class="nav-item">
                    <a href="widgets.html" class="nav-link menu-link">
                        <i data-feather="copy" class="icon-dual"></i> <span data-key="t-widgets">Widgets</span>
                    </a>
                </li> <!-- end widgets -->

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
