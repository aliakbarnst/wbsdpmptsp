<!DOCTYPE html>
 <html lang="en">
<head>
<meta charset="utf-8">
<title>Faq's - Whistleblowing System | DPMPTSP Provinsi Riau</title>
<!-- Stylesheets -->
<link href="{{ asset('assets/frontend/wbs/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{ asset('assets/frontend/wbs/css/style.css')}}" rel="stylesheet">
<link href="{{ asset('assets/frontend/wbs/css/responsive.css')}}" rel="stylesheet">
<!--Color Switcher Mockup-->
<link href="css/color-switcher-design.css" rel="stylesheet">

<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="{{ asset('assets/backend/images/logo-letter.png') }}">


<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

</head>

<body>

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>
 	<!-- Header span -->


    <!-- Main Header-->
    <header class="main-header">
        <div class="main-box">
        	<div class="auto-container clearfix">
            	<div class="logo-box">
                	<div class="logo"><a href="{{ url ('/') }}"><img src="{{ asset('assets/frontend/wbs/images/logo-ok.png') }}" alt="" title=""></a></div>
                </div>

                <!--Nav Box-->
                <div class="nav-outer clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="navbar-header">
                            <!-- Togg le Button -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon flaticon-menu-button"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li><a href="{{ url ('/') }}">Home</a></li>
                                <li><a href="{{ url ('/statistik') }}">Statistik</a></li>
                                <li class="current"><a href="{{ url ('/faq') }}">FAQ's</a></li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->

                    <!-- Outer box -->
                    <div class="outer-box">
                        <!-- Button Box -->
                        <div class="btn-box">
                            <a href="{{ url ('/login') }}" class="theme-btn btn-style-one"><span class="btn-title">Buat Pengaduan Sekarang</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>

            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{ url('/') }}"><img src="{{ asset('assets/frontend/wbs/images/logo-ok.png') }}" alt="" title=""></a></div>

                <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
            </nav>
        </div><!-- End Mobile Menu -->

    </header>
    <!--End Main Header -->

    <section class="page-title" style="background-image:url({{ asset('assets/frontend/wbs/images/background/head-1.jpg') }});">
        <div class="auto-container">
            <h1>FAQ's</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>FAQ's</li>
            </ul>
        </div>
    </section>
    
    <section class="faq-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title">
                <span class="title">FAQ'S</span>
                <h2>Petanyaan <span>Umum</span></h2>
            </div>

            <div class="row clearfix">
                <!-- Content Column -->
                <div class="content-column col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!--Accordian Box-->
                        <ul class="accordion-box">
                            <!--Block-->
                            @foreach($faq as $key)
                            <li class="accordion block wow fadeInUp">
                                <div class="acc-btn"><div class="icon-outer"><span class="icon icon-plus fa fa-angle-down"></span> </div>{{ $key->pertanyaan }}</div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">{{ $key->jawaban }}</div>
                                    </div>
                                </div>
                            </li>
                            @endforeach       
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer class="main-footer">
        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="auto-container">
                <div class="row">
                    <!--Big Column-->
                    <div class="big-column col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <!--Footer Column-->
                            <div class="footer-column col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget about-widget">
                                    <div class="logo">
                                        <a href="{{ url('/') }}"><img src="{{ asset('assets/frontend/wbs/images/logo-ok.png') }}" alt="" /></a>
                                    </div>
                                    <div class="text">
                                        <p>Whistleblowing System adalah aplikasi yang disediakan oleh Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Provinsi Riau bagi Anda yang memiliki informasi dan ingin melaporkan suatu perbuatan berindikasi pelanggaran yang terjadi di lingkungan Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Provinsi Riau.</p>
                                    </div>
                                    <ul class="social-icon-one social-icon-colored">
                                        <li><a href="{{ $pengaturan_website->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ $pengaturan_website->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ $pengaturan_website->facebook }}"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="{{ $pengaturan_website->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="footer-column col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget useful-links">
                                    <h2 class="widget-title">Tautan</h2>
                                    <ul class="user-links">
                                        <li><a href="{{ url ('/') }}">Home</a></li>
                                        <li><a href="{{ url ('/statistik') }}">Statistik</a></li>
                                        <li><a href="{{ url ('/faq') }}">FAQ's</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="footer-column col-lg-4 col-md-6 col-sm-12">
                                <!--Footer Column-->
                                <div class="footer-widget contact-widget">
                                    <h2 class="widget-title">Hubungi Kami</h2>
                                     <!--Footer Column-->
                                    <div class="widget-content">
                                        <ul class="contact-list">
                                            <li>
                                                <span class="icon flaticon-clock"></span>
                                                <div class="text">Senin - Jum'at: 08:00 - 16:00</div>
                                            </li>

                                            <li>
                                                <span class="icon flaticon-phone"></span>
                                                <div class="text"><a href="tel:{{ $pengaturan_website->telpon }}">{{ $pengaturan_website->telpon }}</a></div>
                                            </li>

                                            <li>
                                                <span class="icon flaticon-paper-plane"></span>
                                                <div class="text"><a href="mailto:{{ $pengaturan_website->email }}">{{ $pengaturan_website->email }}</a></div>
                                            </li>

                                            <li>
                                                <span class="icon flaticon-worldwide"></span>
                                                <div class="text">{{ $pengaturan_website->alamat }}</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <!--Footer Bottom-->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <div class="copyright-text">
                        <p>© Copyright 2021 WBS - Whistleblowing System by <a href="{{ url ('/') }}">TIM IT DPMPTSP PROVINSI RIAU</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

</div>
<!--End pagewrapper-->

<!-- Color Palate / Color Switcher -->
<div class="color-palate">
    <div class="color-trigger">
        <i class="fa fa-cog"></i>
    </div>
    <div class="color-palate-head">
        <h6>Choose Your Demo</h6>
    </div>
    <ul class="box-version option-box"> <li>Full width</li> <li class="box">Boxed</li> </ul>
    <ul class="rtl-version option-box"> <li>LTR Version</li> <li class="rtl">RTL Version</li> </ul>
    <div class="palate-foo">
        <span>You will find much more options for colors and styling in admin panel. This color picker is used only for demonstation purposes.</span>
    </div>
    <a href="#" class="purchase-btn">Purchase now</a>
</div><!-- End Color Switcher -->

<!--Search Popup-->
<div id="search-popup" class="search-popup">
	<div class="close-search theme-btn"><span class="fas fa-window-close"></span></div>
	<div class="popup-inner">
		<div class="overlay-layer"></div>
    	<div class="search-form">
        	<form method="post" action="{{ url('/') }}">
            	<div class="form-group">
                	<fieldset>
                        <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required >
                        <input type="submit" value="Search Now!" class="theme-btn">
                    </fieldset>
                </div>
            </form>

            <br>
            <h3>Recent Search Keywords</h3>
            <ul class="recent-searches">
                <li><a href="#">Seo</a></li>
                <li><a href="#">Bussiness</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Digital</a></li>
                <li><a href="#">Conferance</a></li>
            </ul>

        </div>

    </div>
</div>

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>
<script src="{{ asset('assets/frontend/wbs/js/jquery.js')}}"></script>
<script src="{{ asset('assets/frontend/wbs/js/popper.min.js')}}"></script>
<script src="{{ asset('assets/frontend/wbs/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/frontend/wbs/js/jquery-ui.js')}}"></script>
<script src="{{ asset('assets/frontend/wbs/js/jquery.fancybox.js')}}"></script>
<script src="{{ asset('assets/frontend/wbs/js/appear.js')}}"></script>
<script src="{{ asset('assets/frontend/wbs/js/owl.js')}}"></script>
<script src="{{ asset('assets/frontend/wbs/js/wow.js')}}"></script>
<script src="{{ asset('assets/frontend/wbs/js/script.js')}}"></script>
<!-- Color Setting -->
<script src="{{ asset('assets/frontend/wbs/js/color-settings.js')}}"></script>
</body>
</html>
