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
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
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

                <!-- About -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('about.view') }}">
                        <i data-feather="book-open" class="icon-dual"></i> <span>About</span>
                    </a>
                </li> <!-- end About -->

                <!-- Testimonial -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('testimonial.view') }}">
                        <i class="mdi mdi-comment-quote-outline"></i> <span>Testimonial</span>
                    </a>
                </li> <!-- end Testimonial -->

                <!-- Supporter -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('supporter.view') }}">
                        <i class="lab las la-handshake"></i> <span>Supporter</span>
                    </a>
                </li> <!-- end Supporter -->

                <!-- Variant -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="lab las la-shapes"></i> <span data-key="t-pages">Variant Box</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">

                            <!-- Variant -->
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-starter"> Variant </a>
                            </li>

                            <!-- Color -->
                            <li class="nav-item">
                                <a href="{{ route('color.view') }}" class="nav-link" data-key="t-starter"> Color </a>
                            </li>

                            <!-- Size -->
                            <li class="nav-item">
                                <a href="{{ route('size.view') }}" class="nav-link" data-key="t-starter"> Size </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Variant -->

                <!-- Widgets -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i data-feather="copy" class="icon-dual"></i> <span data-key="t-widgets">Widgets</span>
                    </a>
                </li> <!-- end widgets -->

                <!-- Multi-level -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                        <i data-feather="share-2" class="icon-dual"></i> <span data-key="t-multi-level">Multi Level</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-level-1.1"> Level 1.1 </a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Level 1.2
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarAccount">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-key="t-level-2.1"> Level 2.1 </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebarCrm" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrm" data-key="t-level-2.2"> Level 2.2
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebarCrm">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link" data-key="t-level-3.1"> Level 3.1 </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link" data-key="t-level-3.2"> Level 3.2 </a>
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