<!DOCTYPE html>
 <html lang="en">
<head>
<meta charset="utf-8">
<title>WBS - Whistleblowing System | DPMPTSP Provinsi Riau</title>
<!-- Stylesheets -->
<link href="{{ asset('assets/frontend/wbs/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{ asset('assets/frontend/wbs/css/style.css')}}" rel="stylesheet">
<link href="{{ asset('assets/frontend/wbs/css/responsive.css')}}" rel="stylesheet">
<!--Color Switcher Mockup-->
<link href="css/color-switcher-design.css" rel="stylesheet">

<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">

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
                	<div class="logo"><a href="index.html"><img src="{{ asset('assets/frontend/wbs/images/logo-ok.png') }}" alt="" title=""></a></div>
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
                                <li class="current"><a href="contact.html">Home</a></li>
                                <li><a href="contact.html">Statistik</a></li>
                                <li><a href="contact.html">Hubungi Kami</a></li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->

                    <!-- Outer box -->
                    <div class="outer-box">
                        <!-- Button Box -->
                        <div class="btn-box">
                            <a href="buy-ticket.html" class="theme-btn btn-style-one"><span class="btn-title">Buat Pengaduan</span></a>
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
                <div class="nav-logo"><a href="index.html"><img src="{{ asset('assets/frontend/wbs/images/logo-ok.png') }}" alt="" title=""></a></div>

                <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
            </nav>
        </div><!-- End Mobile Menu -->

    </header>
    <!--End Main Header -->

    <!-- Banner Section -->
    <section class="banner-section">
        <div class="banner-carousel owl-carousel owl-theme">
            <!-- Slide Item -->
            @foreach($slider as $item)

            <div class="slide-item" style="background-image: url({{ asset('uploads/images/gambar-slider/'.$item->gambar) }});">
                <div class="auto-container">
                    <div class="content-box">
                        <h2> {{ $item->nama }} <br>{{ $item->nama_kedua }}</h2>
                        {{-- <ul class="info-list">
                            <li><span class="icon fa fa-chair"></span> 5000 Seats</li>
                            <li><span class="icon fa fa-user-alt"></span> 12 SPEAKERS</li>
                            <li><span class="icon fa fa-map-marker-alt"></span> Pekanbaru, Provinsi Riau</li>
                        </ul> --}}
                        <div class="btn-box"><a href="buy-ticket.html" class="theme-btn btn-style-two"><span class="btn-title">Buat Pengaduan</span></a></div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>
    
    <section class="about-section">
        <div class="anim-icons full-width">
            <span class="icon icon-circle-blue wow fadeIn"></span>
            <span class="icon icon-dots wow fadeInleft"></span>
            <span class="icon icon-circle-1 wow zoomIn"></span>
        </div>
        <div class="auto-container">
            <div class="row">
                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="title">Tentang WBS</span>
                            <div class="text">Whistleblowing System adalah aplikasi yang disediakan oleh Badan Koordinasi Penanaman Modal bagi Anda yang memiliki informasi dan ingin melaporkan suatu perbuatan berindikasi pelanggaran yang terjadi di lingkungan Badan Koordinasi Penanaman Modal.</div>
                        </div>
                 
                        <!-- <div class="btn-box"><a href="contact.html" class="theme-btn btn-style-three"><span class="btn-title">Register Now</span></a></div> -->
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="image-box">
                        <figure class="image wow fadeIn"><img src="{{ asset('assets/frontend/wbs/images/resource/about-img-1.jpg') }}" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why-choose-us">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="title">Siapa yang bisa menggunakannya?</span>
                            <div class="text">Pengguna aplikasi sistem ini (disebut pelapor) adalah setiap orang. Setiap orang bisa menggunakan sistem ini untuk mendukung pemberantasan tindak pidana korupsi di lingkungan Badan Koordinasi Penanaman Modal.</div>
                        </div>
                    </div>
                </div>
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="image-box">
                        <figure class="image"><img src="{{ asset('assets/frontend/wbs/images/background/3.jpg') }}" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="anim-icons full-width">
            <span class="icon icon-circle-blue wow fadeIn"></span>
            <span class="icon icon-dots wow fadeInleft"></span>
            <span class="icon icon-circle-1 wow zoomIn"></span>
        </div>
        <div class="auto-container">
            <div class="row">
                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="title">Kriteria Pengaduan</span>
                            <div class="text">Sistem Aplikasi Whistleblower Badan Koordinasi Penanaman Modal menerima pengaduan yang terkait dengan tindak pidana korupsi seperti yang diatur dalam Undang-Undang No. 20 Tahun 2001 mengenai Pemberantasan Tindak Pidana Korupsi.</div>
                        </div>
                 
                        <!-- <div class="btn-box"><a href="contact.html" class="theme-btn btn-style-three"><span class="btn-title">Register Now</span></a></div> -->
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="image-box">
                        <figure class="image wow fadeIn"><img src="{{ asset('assets/frontend/wbs/images/resource/about-img-1.jpg') }}" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why-choose-us">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="title">Kerahasiaan Seorang Whistleblower</span>
                            <div class="text">Badan Koordinasi Penanaman Modal menjamin kerahasiaan whistleblower. Perlindungan atas kerahasiaan identitas whistleblower akan diberikan kepada whistleblower yang memberikan informasi tentang adanya indikasi tindak pidana korupsi yang dilakukan oleh pejabat/pegawai Badan Koordinasi Penanaman Modal selama proses pembuktian pengaduan/pelaporan indikasi tindak pidana korupsi, sesuai dengan perundang-undangan yang berlaku.</div>
                        </div>
                    </div>
                </div>
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="image-box">
                        <figure class="image"><img src="{{ asset('assets/frontend/wbs/images/background/3.jpg') }}" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--End About Section -->

    <!-- Fun Fact Section -->
    <section class="fun-fact-section">
        <div class="auto-container">
            <div class="fact-counter">
                <div class="row clearfix">

                    <!--Column-->
                    <div class="counter-column col-lg-6 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="count-box">
                            <span class="icon icon_headphones"></span>
                            <span class="count-text" data-speed="3000" data-stop="190">0</span>
                            <h4 class="counter-title">Laporan Diterima</h4>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="counter-column col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                        <div class="count-box">
                            <span class="icon icon_ribbon_alt"></span>
                            <span class="count-text" data-speed="3000" data-stop="62">0</span>
                            <h4 class="counter-title">Laporan Diproses</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--End Fun Fact Section -->

    <!-- schedule Section -->
    <section class="schedule-section">
        <div class="anim-icons">
            <span class="icon icon-circle-4 wow zoomIn"></span>
            <span class="icon icon-circle-3 wow zoomIn"></span>
        </div>

        <div class="auto-container">
            <div class="sec-title text-center">
                <!-- <span class="title">About Conference</span> -->
                <h2>SOP</h2>
            </div>

            <div class="schedule-tabs tabs-box">

                <div class="tabs-content">

                    <!--Tab-->
                    <div class="tab active-tab" id="tab-1">
                        <div class="schedule-timeline">
                            <!-- schedule Block -->
                            <div class="schedule-block">
                                <div class="inner-box">
                                    <div class="inner">
                                        <div class="date">9.00 AM <br> 10.00 AM</div>
                                        <div class="speaker-info">
                                            <figure class="thumb"><img src="images/resource/thumb-1.jpg" alt=""></figure>
                                            <h5 class="name">Ashli Scroggy</h5>
                                            <span class="designation">Founder & CEO</span>
                                        </div>
                                        <h4><a href="event-detail.html">Modern Marketing Summit Sydney 2018</a></h4>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmtempor incididunt labore et</div>
                                        <div class="btn-box">
                                            <a href="event-detail.html" class="theme-btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <!-- schedule Block -->
                            <div class="schedule-block even">
                                <div class="inner-box">
                                    <div class="inner">
                                        <div class="date">10.00 AM <br> 11.00 AM</div>
                                        <div class="speaker-info">
                                            <figure class="thumb"><img src="images/resource/thumb-2.jpg" alt=""></figure>
                                            <h5 class="name">Ashli Scroggy</h5>
                                            <span class="designation">Founder & CEO</span>
                                        </div>
                                        <h4><a href="event-detail.html">Modern Marketing Summit Sydney 2018</a></h4>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmtempor incididunt labore et</div>
                                        <div class="btn-box">
                                            <a href="event-detail.html" class="theme-btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- schedule Block -->
                            <div class="schedule-block">
                                <div class="inner-box">
                                    <div class="inner">
                                        <div class="date">11.00 AM <br> 12.00 AM</div>
                                        <div class="speaker-info">
                                            <figure class="thumb"><img src="images/resource/thumb-1.jpg" alt=""></figure>
                                            <h5 class="name">Ashli Scroggy</h5>
                                            <span class="designation">Founder & CEO</span>
                                        </div>
                                        <h4><a href="event-detail.html">Modern Marketing Summit Sydney 2018</a></h4>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmtempor incididunt labore et</div>
                                        <div class="btn-box">
                                            <a href="event-detail.html" class="theme-btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <!-- schedule Block -->
                            <div class="schedule-block even">
                                <div class="inner-box">
                                    <div class="inner">
                                        <div class="date">12.00 AM <br> 01.00 PM</div>
                                        <div class="speaker-info">
                                            <figure class="thumb"><img src="images/resource/thumb-2.jpg" alt=""></figure>
                                            <h5 class="name">Ashli Scroggy</h5>
                                            <span class="designation">Founder & CEO</span>
                                        </div>
                                        <h4><a href="event-detail.html">Modern Marketing Summit Sydney 2018</a></h4>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmtempor incididunt labore et</div>
                                        <div class="btn-box">
                                            <a href="event-detail.html" class="theme-btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <!-- schedule Block -->
                             <div class="schedule-block">
                                <div class="inner-box">
                                    <div class="inner">
                                        <div class="date">11.00 AM <br> 12.00 AM</div>
                                        <div class="speaker-info">
                                            <figure class="thumb"><img src="images/resource/thumb-1.jpg" alt=""></figure>
                                            <h5 class="name">Ashli Scroggy</h5>
                                            <span class="designation">Founder & CEO</span>
                                        </div>
                                        <h4><a href="event-detail.html">Modern Marketing Summit Sydney 2018</a></h4>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmtempor incididunt labore et</div>
                                        <div class="btn-box">
                                            <a href="event-detail.html" class="theme-btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <!-- schedule Block -->
                            <div class="schedule-block even">
                                <div class="inner-box">
                                    <div class="inner">
                                        <div class="date">12.00 AM <br> 01.00 PM</div>
                                        <div class="speaker-info">
                                            <figure class="thumb"><img src="images/resource/thumb-2.jpg" alt=""></figure>
                                            <h5 class="name">Ashli Scroggy</h5>
                                            <span class="designation">Founder & CEO</span>
                                        </div>
                                        <h4><a href="event-detail.html">Modern Marketing Summit Sydney 2018</a></h4>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmtempor incididunt labore et</div>
                                        <div class="btn-box">
                                            <a href="event-detail.html" class="theme-btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--End schedule Section -->


    <!-- Video Section -->
    <!-- <section class="video-section" style="background-image: url(images/background/1.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="text">VIDEO</div>
                <h2>CARA PENGGUNAAN APLIKASI</h2>
                <a href="https://www.youtube.com/watch?v=Fvae8nxzVz4" class="play-now" data-fancybox="gallery" data-caption=""><i class="icon flaticon-play-button-3" aria-hidden="true"></i><span class="ripple"></span></a>
            </div>
        </div>
    </section> -->
    <!--End Video Section -->

    <!-- Why Choose Us -->

    <!-- End Why Choose Us -->

    <!-- Main Footer -->
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
                                        <a href="index.html"><img src="{{ asset('assets/frontend/wbs/images/logo-ok.png') }}" alt="" /></a>
                                    </div>
                                    <div class="text">
                                        <p>We have very good strength in innovative technology and tools with over 35 years of experience. We makes long-term investments goal in global companies in different sectors, mainly in Europe and other countries.</p>
                                    </div>
                                    <ul class="social-icon-one social-icon-colored">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="footer-column col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget useful-links">
                                    <h2 class="widget-title">Tautan</h2>
                                    <ul class="user-links">
                                        <li><a href="contact.html">Home</a></li>
                                        <li><a href="contact.html">Statistik</a></li>
                                        <li><a href="contact.html">Hubungi Kami</a></li>
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
                                                <div class="text">Mon - Fri: 09:00 - 18:00</div>
                                            </li>

                                            <li>
                                                <span class="icon flaticon-phone"></span>
                                                <div class="text"><a href="tel:+1-345-5678-77">+1-345-5678-77</a></div>
                                            </li>

                                            <li>
                                                <span class="icon flaticon-paper-plane"></span>
                                                <div class="text"><a href="mailto:support@example.com">support@example.com</a></div>
                                            </li>

                                            <li>
                                                <span class="icon flaticon-worldwide"></span>
                                                <div class="text">13005 Greenville Avenue<br> California, TX 70240</div>
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
                        <p>© Copyright 2020 All Rights Reserved by <a href="index.html">Expert-Themes</a></p>
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
        	<form method="post" action="index.html">
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
