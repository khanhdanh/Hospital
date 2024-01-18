<header>
    <div class="header-area">
        <div class="header-top_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="social_media_links">

                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="short_contact_list">
                            <ul>
                                <li>
                                    <a href="{{ route('login') }}">Login</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">Register</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="">
                        <div class="main-menu d-none d-lg-block">
                            <nav>

                                <ul id="navigation">
                                    <li> <a href="{{ route('home.index') }}">
                                            <img style="width: 40%"
                                                src="{{ asset('frontend/img/z5053597913387_cac673d6b280671378b37443c92a9100.jpg') }}"/>

                                        </a></li>
                                    <li><a href="{{ route('ui.department') }}">DEPARTMENTS</a></li>
                                    <li><a href="{{ route('ui.service') }}">SERVICES</a></li>
                                    <!-- <li>
                                        <a href="#">blog <i class="ti-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">blog</a></li>
                                            <li><a href="single-blog.html">single-blog</a></li>
                                        </ul>
                                    </li> -->
                                    <li>
                                        <a href="#">PATIENT <i class="ti-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('patient.register') }}">REGISTER PATIENT</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('ui.doctor') }}">DOCTORS</a></li>
                                    <li><a href="{{ route('ui.about') }}">ABOUT</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('ui.contact') }}">CONTACT</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                        <div class="Appointment">
                            <div class="book_btn d-none d-lg-block">
                                <a href="{{ route('search') }}">FINDING DOCTOR</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
