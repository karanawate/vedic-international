<header>
    <div class="container">
        <div class="header-content d-flex flex-wrap align-items-center">
            <div class="logo">
                <a href="{{ url('') }}" title="">
                    <img src="assets/img/logo.png" alt="" srcset="assets/img/01_Logo_2x.png 2x"> 
                </a>
            </div><!--logo end-->
            <ul class="contact-add d-flex flex-wrap">
                <li>
                    <div class="contact-info">
                        <img src="assets/img/icon1.png" alt="">
                        <div class="contact-tt">
                            <h4>Call</h4>
                            <span>+2 342 5446 67</span>
                        </div>
                    </div><!--contact-info end-->
                </li>
                <li>
                    <div class="contact-info">
                        <img src="assets/img/icon2.png" alt="">
                        <div class="contact-tt">
                            <h4>Work Time</h4>
                            <span>Mon - Fri 8 AM - 5 PM</span>
                        </div>
                    </div><!--contact-info end-->
                </li>
                <li>
                    <div class="contact-info">
                        <img src="assets/img/icon3.png" alt="">
                        <div class="contact-tt">
                            <h4>Address</h4>
                            <span>Franklin St, Greenpoint Ave</span>
                        </div>
                    </div><!--contact-info end-->
                </li>
            </ul><!--contact-information end-->
            <div class="menu-btn">
                <a href="#">
                    <span class="bar1"></span>
                    <span class="bar2"></span>
                    <span class="bar3"></span>
                </a>
            </div><!--menu-btn end-->
        </div><!--header-content end-->
        <div class="navigation-bar d-flex flex-wrap align-items-center">
            <nav class="navbar navbar-expand-lg navbar-light header-navigation stricky original">
                <ul>
                    <li><a class="active" href="{{ url('') }}" title="">Home</a></li>
                    <li><a href="{{ url('about') }}" title="">About</a>
                        <ul>
                            <li><a href="{{ url('events') }}" title="">Events</a>
                                <ul>
                                    <li><a href="event-single.html" title="">Event Single</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('schedule') }}" title="">Schedule</a></li>
                            <li><a href="error.html" title="">404</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('classes') }}" title="">Classes</a>
                        <ul>
                            <li><a href="class-single.html" title="">Class Single</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('gallery') }}" title="">Gallery</a></li>
                    <li><a href="{{ url('blog') }}" title="">Blog</a></li>
                    <li><a href="{{ url('contact') }}" title="">Contacts</a></li>
                </ul>
            </nav><!--nav end-->
            <nav class="navbar navbar-expand-lg navbar-light header-navigation stricky stricked-menu">
                <div class="container clearfix">
                    <div class="logo">
                        <a href="{{ url('') }}" title="">
                            <img src="assets/img/logo.png" alt="" srcset="assets/img/01_Logo_2x.png 2x"> 
                        </a>
                    </div><!--logo end-->
                    <ul>
                        <li><a class="active" href="{{ url('') }}" title="">Home</a></li>
                        <li><a href="{{ url('about') }}" title="">About</a>
                            <ul>
                                <li><a href="{{ url('events') }}" title="">Events</a>
                                    <ul>
                                        <li><a href="event-single.html" title="">Event Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('schedule') }}" title="">Schedule</a></li>
                                <li><a href="error.html" title="">404</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('classes') }}" title="">Classes</a>
                            <ul>
                                <li><a href="class-single.html" title="">Class Single</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('gallery') }}" title="">Gallery</a></li>
                        <li><a href="{{ url('blog') }}" title="">Blog</a></li>
                        <li><a href="{{ url('contact') }}" title="">Contacts</a></li>
                    </ul>
                </div>
            </nav><!--nav end-->
            <ul class="social-links ml-auto">
                <li><a href="#" title=""><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" title=""><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="#" title=""><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div><!--navigation-bar end-->
    </div>
</header><!--header end-->
<div class="responsive-menu">
    <ul>
        <li><a href="{{ url('') }}" title="">Home</a></li>
        <li><a href="{{ url('about') }}" title="">About</a></li>
        <li><a href="{{ url('events') }}" title="">Events</a></li>
        <li><a href="event-single.html" title="">Event Single</a></li>
        <li><a href="{{ url('schedule') }}" title="">Schedule</a></li>
        <li>
            <a href="{{ url('classes') }}" title="">Classes</a>
            <ul>
                <li><a href="class-single.html" title="">Class Single</a></li>
            </ul>
        </li>
        <li><a href="class-single.html" title="">Classe Single</a></li>
        <li><a href="{{ url('gallery') }}" title="">Gallery</a></li>
        <li><a href="{{ url('blog') }}" title="">Blog</a></li>
        <li><a href="post.html" title="">Blog Single</a></li>
        <li><a href="{{ url('contact') }}" title="">Contacts</a></li>
        <li><a href="error.html" title="">404</a></li>
    </ul>
</div><!--responsive-menu end-->