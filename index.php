<!DOCTYPE html>
<html lang="en">

<head>
    <title>BVM Talks</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/loader.css" />
    <link rel="stylesheet" href="css/uikit.min.css" />
    <link rel="stylesheet" href="css/style.css" />

    <?php
        session_start();
        $btntext = "Log in";
        $onclick = "location.href='login.php'";
        $signup = "<li class=\"uk-margin-auto-vertical\"><button class=\"uk-button uk-button-primary uk-margin-small-left\" onclick=\"location.href='register.php'\">Sign up</button></li>";
        $signup_s = "<li><a class=\"uk-margin-top uk-button uk-button-primary\" onclick=\"location.href='register.php'\">Sign up</a></li>";
        if (isset($_SESSION["loggedin"])){
            if ($_SESSION["loggedin"] == 1){
                $btntext = "Log out";
                $onclick = "location.href='index.php?logged=true'";
                if(isset($_COOKIE["admin"])){
                    if($_COOKIE["admin"] === "true"){
                        $signup = "<li class=\"uk-margin-auto-vertical\"><button class=\"uk-button uk-button-primary uk-margin-small-left\" onclick=\"location.href='panel.php'\">Admin panel</button></li>";
                        $signup_s = "<li><a class=\"uk-margin-top uk-button uk-button-primary\" onclick=\"location.href='panel.php'\">Admin panel</a></li>";    
                    }
                    else{
                        $signup = "";
                        $signup_s = "";
                    } 
                }    
            }
        }
        if (isset($_GET['logged'])) {
            unsetsess();
        }

        function unsetsess() {
            $btntext = "Log in";
            session_unset();
            session_destroy();
            header("Location: login.php");
        }
    ?>
</head>

<body>

    <div class="load-frame">
        <div class="loader"></div>
    </div>

    <nav class="uk-navbar uk-navbar-transparent uk-navbar-container uk-margin-large-left uk-margin-large-right uk-margin-remove@s"
        uk-sticky="show-on-up: true; animation: uk-animation-slide-top; bottom: #bottom">
        <a href="#" class="uk-navbar-item uk-logo">
            <img class="uk-hidden@m" src="img/logo@s.png" alt="LOGO" width="70" uk-img>
            <img class="uk-visible@m" src="img/logo@m.png" alt="LOGO" width="220" uk-img>
        </a>
        <div class="uk-navbar-right">
            <a class="uk-navbar-toggle uk-hidden@m" href="#" id="navbtn">
                <div id="nav-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
            <ul class="uk-navbar-nav uk-visible@m">
                <li><a href="#" id="gilroyfont" uk-scroll>Home</a></li>
                <li><a href="#speakers" id="gilroyfont" uk-scroll>Speakers</a></li>
                <li><a href="#schedule" id="gilroyfont" uk-scroll>Schedule</a></li>
                <li><a href="#gallery_" id="gilroyfont" uk-scroll>Gallery</a></li>
                <li><a href="#venue" id="gilroyfont" uk-scroll>Venue</a></li>
                <li><a href="#contact" id="gilroyfont" uk-scroll>Contact</a></li>
                <li class="uk-margin-auto-vertical"><button class="uk-button uk-margin-large-left" onclick=<?php echo $onclick ?>><?php echo $btntext ?></button></li>
                <?php echo $signup ?>
            </ul>
        </div>
        <div class="uk-hidden@m" id="navbarNav">
            <img id="svg" class="uk-align-center" src="img/logo.svg" alt="LOGO" width="200">
            <div class="uk-container">
                <ul class="uk-list">
                    <li><a href="#">Home</a></li>
                    <li><a href="#speakers" uk-scroll>Speakers</a></li>
                    <li><a href="#schedule" uk-scroll>Schedule</a></li>
                    <li><a href="#gallery_" uk-scroll>Gallery</a></li>
                    <li><a href="#venue" uk-scroll>Venue</a></li>
                    <li><a href="#contact" uk-scroll>Contact</a></li>
                    <li><a onclick=<?php echo $onclick ?>><?php echo $btntext ?></a></li>
                    <?php echo $signup_s ?>
                </ul>
            </div>

        </div>
    </nav>

    <div class="uk-visible@m" id="follow">
        <ul class="uk-list">
            <li><a href="#" class="uk-icon-button"><span class="fab fa-twitter"></span></a></li>
            <li><a href="#" class="uk-icon-button"><span class="fab fa-dribbble"></span></a></li>
            <li><a href="#" class="uk-icon-button"><span class="fab fa-instagram"></span></a></li>
            <li><a href="#" class="uk-icon-button"><span class="fab fa-github"></span></a></li>
        </ul>
    </div>

    <a href="#scroll" uk-scroll>
        <div id="mouse-scroll">
            <div class="mouse">
                <div class="mouse-in"></div>
            </div>
        </div>
    </a>

    <img class="uk-hidden@m" id="svg" src="img/logo.svg" width="200">

    <div class="uk-container uk-margin-xlarge-left uk-margin-remove@s">
        <div class="uk-height-viewport uk-child-width-1-2@m" uk-grid>
            <div class="uk-margin-auto-vertical">
                <span>Lorem Ipsum presents</span>
                <h1 class="uk-h1 uk-bold uk-margin-remove" id="changeHeader">BVM <span
                        class="seccol" id="point">Talks</span>'20.</h1>
                <div class="spectfont">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                <div class="uk-margin-small-top">
                    <a href="https://maps.google.com/?q=22.5518978,72.9239577" target="_blank"><span class="fa fa-fw fa-map-marker-alt"></span> BVM Auditorium</a><br>
                    <a href="#"><span class="fa fa-fw fa-calendar-day" type="button"></span> 25 Sep 2020</a>
                    <div uk-dropdown>
                        <ul class="uk-nav uk-dropdown-nav">
                            <li class="uk-nav-header">Add to your calendar</li>
                            <li><a href="https://www.google.com/calendar/render?action=TEMPLATE&text=BVM+Talks&dates=20200925T050000Z/20200925T070000Z&location=BVM+Auditorium,+BVM+College,+Vallabh+Vidhyanagar,+Anand+-+388120&sprop=name:BVM+Talks&sprop=website:www.bvm-talks.com&details=BVM+Talks+event&sf=true&output=xml" target="_blank"><span class="fab fa-google fa-fw"></span> Google</a></li>
                            <li><a href="https://outlook.live.com/owa/0/?path=%2fcalendar%2faction%2fcompose#startdt=20200925T050000Z&enddt=20200925T070000Z&subject=BVM+Talks&location=BVM+Talks&location=BVM+Auditorium,+Vallabh+Vidhyanagar,+Anand+-+388120&body=BVM+Talks+event&allday=&uid=" target="_blank"><span class="fa fa-envelope fa-fw"></span> Outlook</a></li>
                            <li><a href="https://calendar.yahoo.com/?v=60&view=d&type=20&title=BVM+Talks&st=20200925T103000&et=20200925T123000&desc=BVM+Talks+event&in_loc=BVM+Auditorium,+BVM+College,+Vallabh+Vidhyanagar,+Anand+-+388120&url=www.bvm-talks.com&uid=" target="_blank"><span class="fab fa-yahoo fa-fw"></span> Yahoo</a></li>
                            <li class="uk-nav-divider"></li>
                            <li>( online calendars )</li>
                        </ul>
                    </div>
                </div>
                </div>

                <div class="uk-margin-xlarge-bottom">
                    <a class="uk-margin-top uk-button uk-button-primary uk-margin-small-right" href="bookticket.php">Book Ticket &nbsp;<span class="fa fa-chevron-right"></span></a>
                    <a class="uk-margin-top uk-button" href="#more" uk-scroll>Learn more &nbsp;<span
                            class="fa fa-arrow-right"></span></a>
                </div>
            </div>

            <div class="uk-margin-auto-vertical uk-visible@m uk-padding-remove uk-text-center">
                <img class="uk-margin-xlarge-bottom" src="img/illustration1.svg" width="320" alt="image" uk-image>
            </div>
        </div>
    </div>

    <div class="uk-container uk-margin-xlarge-right uk-margin-xlarge-left uk-margin-remove@s" id="scroll">
        <div class="uk-margin-bottom spectfont">
            <div class="uk-h1">#Countdown</div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </div>
        <div class="uk-grid-small uk-child-width-auto uk-margin-bottom" uk-grid uk-countdown="date: 2020-09-25T10:30:00+00:00">
            <div>
                <div class="uk-countdown-number uk-countdown-days"></div>
                <div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s">Days</div>
            </div>
            <div class="uk-countdown-separator">:</div>
            <div>
                <div class="uk-countdown-number uk-countdown-hours"></div>
                <div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s">Hours</div>
            </div>
            <div class="uk-countdown-separator">:</div>
            <div>
                <div class="uk-countdown-number uk-countdown-minutes"></div>
                <div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s">Minutes</div>
            </div>
            <div class="uk-countdown-separator">:</div>
            <div>
                <div class="uk-countdown-number uk-countdown-seconds"></div>
                <div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s">Seconds</div>
            </div>
        </div>
    </div>

    <div class="uk-container uk-margin-large-top uk-margin-xlarge-right uk-margin-xlarge-left uk-margin-remove@s" id="more">
        <h1 class="uk-h1 uk-bold uk-margin-top">About <span class="seccol">BVM Talks</span></h1>
        <div class="uk-margin-bottom spectfont">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
    </div>

    <div class="uk-container"><hr class="uk-divider-icon"></div>

    <div class="uk-container uk-margin-xlarge-right uk-margin-xlarge-left uk-margin-remove@s">
        <h1 class="uk-h1 uk-margin-medium-top uk-bold">Why <span class="seccol">attend</span> ?</h1>
        <div class="uk-margin-bottom spectfont">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
    </div>

    <div class="uk-container"><hr class="uk-divider-icon"></div>

    <div class="uk-container uk-margin-xlarge-right uk-margin-xlarge-left uk-margin-remove@s" id="speakers">
        <h1 class="uk-h1 uk-margin-medium-top uk-bold">Who's <span class="seccol">speaking</span> ?</h1>
        <div class="uk-margin-bottom spectfont">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </div>
        <div class="uk-margin-top">
            <div class="uk-child-width-1-3@m" uk-grid>
                <div>
                    <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
                        <img loading="lazy" src="img/speaker1.jpg" alt="speaker 1" uk-img>
                        <div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-default">
                            <div class="uk-text-center">
                                <div class="uk-h4">Follow</div>
                                <a href="#" class="uk-icon-button"><span class="fab fa-twitter"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-dribbble"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-instagram"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-github"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="uk-text-center">
                        <h4 class="uk-h4 uk-margin-remove-bottom uk-margin-top">Lorem Ipsum</h4>
                        <span class="spectfont">Lorem ipsum dolor sit amet</span>
                    </div>
                </div>
                <div>
                    <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
                        <img loading="lazy" src="img/speaker2.jpg" alt="speaker 2" uk-img>
                        <div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-default">
                            <div class="uk-text-center">
                                <div class="uk-h4">Follow</div>
                                <a href="#" class="uk-icon-button"><span class="fab fa-twitter"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-dribbble"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-instagram"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-github"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="uk-text-center">
                        <h4 class="uk-h4 uk-margin-remove-bottom uk-margin-top">Lorem Ipsum</h4>
                        <span class="spectfont">Lorem ipsum dolor sit amet</span>
                    </div>
                </div>
                <div>
                    <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
                        <img loading="lazy" src="img/speaker3.jpg" alt="speaker 3" uk-img>
                        <div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-default">
                            <div class="uk-text-center">
                                <div class="uk-h4">Follow</div>
                                <a href="#" class="uk-icon-button"><span class="fab fa-twitter"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-dribbble"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-instagram"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-github"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="uk-text-center">
                        <h4 class="uk-h4 uk-margin-remove-bottom uk-margin-top">Lorem Ipsum</h4>
                        <span class="spectfont">Lorem ipsum dolor sit amet</span>
                    </div>
                </div>
                <div>
                    <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
                        <img loading="lazy" src="img/speaker4.jpg" alt="speaker 4" uk-img>
                        <div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-default">
                            <div class="uk-text-center">
                                <div class="uk-h4">Follow</div>
                                <a href="#" class="uk-icon-button"><span class="fab fa-twitter"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-dribbble"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-instagram"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-github"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="uk-text-center">
                        <h4 class="uk-h4 uk-margin-remove-bottom uk-margin-top">Lorem Ipsum</h4>
                        <span class="spectfont">Lorem ipsum dolor sit amet</span>
                    </div>
                </div>
                <div>
                    <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
                        <img loading="lazy" src="img/speaker5.jpg" alt="speaker 5" uk-img>
                        <div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-default">
                            <div class="uk-text-center">
                                <div class="uk-h4">Follow</div>
                                <a href="#" class="uk-icon-button"><span class="fab fa-twitter"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-dribbble"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-instagram"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-github"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="uk-text-center">
                        <h4 class="uk-h4 uk-margin-remove-bottom uk-margin-top">Lorem Ipsum</h4>
                        <span class="spectfont">Lorem ipsum dolor sit amet</span>
                    </div>
                </div>
                <div>
                    <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
                        <img loading="lazy" src="img/speaker6.jpg" alt="speaker 6" uk-img>
                        <div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-default">
                            <div class="uk-text-center">
                                <div class="uk-h4">Follow</div>
                                <a href="#" class="uk-icon-button"><span class="fab fa-twitter"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-dribbble"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-instagram"></span></a>
                                <a href="#" class="uk-icon-button"><span class="fab fa-github"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="uk-text-center">
                        <h4 class="uk-h4 uk-margin-remove-bottom uk-margin-top">Lorem Ipsum</h4>
                        <span class="spectfont">Lorem ipsum dolor sit amet</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-container uk-margin-top"><hr class="uk-divider-icon"></div>

    <div class="uk-container uk-margin-xlarge-right uk-margin-xlarge-left uk-margin-remove@s">
        <h1 class="uk-h1 uk-margin-medium-top uk-bold"><span class="seccol">Book</span> Ticket now</h1>
        <div class="uk-margin-bottom spectfont">
            Book ticket now to register your presence.
        </div>
        <a class="uk-button uk-button-primary" href="bookticket.php">Book now &nbsp;<span class="fa fa-arrow-right"></span></a>
    </div>

    <div class="uk-container uk-margin-top"><hr class="uk-divider-icon"></div>

    <div class="uk-container uk-margin-xlarge-right uk-margin-xlarge-left uk-margin-remove@s" id="schedule">
        <h1 class="uk-h1 uk-margin-medium-top uk-bold"><span class="seccol">Schedule</span></h1>
        <div class="uk-margin-bottom spectfont">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </div>    
    </div>

    <div class="uk-container uk-margin-top"><hr class="uk-divider-icon"></div>

    <div class="uk-container uk-margin-xlarge-right uk-margin-xlarge-left uk-margin-remove@s" id="gallery_">
        <h1 class="uk-h1 uk-margin-medium-top uk-bold">Our <span class="seccol">gallery</span></h1>
        <div class="uk-margin-bottom spectfont">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </div>
        <div uk-filter="target: .js-filter">
            <ul class="uk-subnav uk-subnav-pill">
                <li class="uk-active" uk-filter-control><a href="#">All</a></li>
                <li class="uk-padding-remove-horizontal uk-margin-small-left" uk-filter-control="[data-group='BVMTalks']"><a href="#">BVM Talks</a></li>
                <li class="uk-padding-remove-horizontal uk-margin-small-left" uk-filter-control="[data-group='achivements']"><a href="#">Achivements</a></li>
                <li class="uk-padding-remove-horizontal uk-margin-small-left" uk-filter-control="[data-group='team']"><a href="#">Team</a></li>
            </ul>
            <div uk-lightbox="animation: slide" >  

                <div id="gallery" class="js-filter">
                    <div class="uk-inline-clip uk-transition-toggle uk-margin-bottom" tabindex="0" data-group='team'>
                        <a class="uk-inline uk-transition-scale-up uk-transition-opaque" href="img/galleryImage1.jpg" data-caption="Caption 1">
                            <img loading="lazy" src="img/galleryImage1-min.jpg" alt="galleryImage1">
                        </a>
                    </div>
                    <div class="uk-inline-clip uk-transition-toggle uk-margin-bottom" tabindex="0" data-group='achivements'>
                        <a class="uk-inline uk-transition-scale-up uk-transition-opaque" href="img/galleryImage2.jpg" data-caption="Caption 2">
                            <img loading="lazy" src="img/galleryImage2-min.jpg" alt="galleryImage2">
                        </a>
                    </div>
                    <div class="uk-inline-clip uk-transition-toggle uk-margin-bottom" tabindex="0" data-group='team'>
                        <a class="uk-inline uk-transition-scale-up uk-transition-opaque" href="img/galleryImage3.jpg" data-caption="Caption 3">
                            <img loading="lazy" src="img/galleryImage3-min.jpg" alt="galleryImage3">
                        </a>
                    </div>
                    <div class="uk-inline-clip uk-transition-toggle uk-margin-bottom" tabindex="0" data-group='BVMTalks'>
                        <a class="uk-inline uk-transition-scale-up uk-transition-opaque" href="img/galleryImage4.jpg" data-caption="Caption 4">
                            <img loading="lazy" src="img/galleryImage4-min.jpg" alt="galleryImage4">
                        </a>
                    </div>
                    <div class="uk-inline-clip uk-transition-toggle uk-margin-bottom" tabindex="0" data-group='team'>
                        <a class="uk-inline uk-transition-scale-up uk-transition-opaque" href="img/galleryImage5.jpg" data-caption="Caption 5">
                            <img loading="lazy" src="img/galleryImage5-min.jpg" alt="galleryImage5">
                        </a>
                    </div>
                    <div class="uk-inline-clip uk-transition-toggle uk-margin-bottom" tabindex="0" data-group='achivements'>
                        <a class="uk-inline uk-transition-scale-up uk-transition-opaque" href="img/galleryImage6.jpg" data-caption="Caption 6">
                            <img loading="lazy" src="img/galleryImage6-min.jpg" alt="galleryImage6">
                        </a>
                    </div>
                    <div class="uk-inline-clip uk-transition-toggle uk-margin-bottom" tabindex="0" data-group='BVMTalks'>
                        <a class="uk-inline uk-transition-scale-up uk-transition-opaque" href="img/galleryImage7.jpg" data-caption="Caption 7">
                            <img loading="lazy" src="img/galleryImage7-min.jpg" alt="galleryImage7">
                        </a>
                    </div>
                    <div class="uk-inline-clip uk-transition-toggle uk-margin-bottom" tabindex="0" data-group='team'>
                        <a class="uk-inline uk-transition-scale-up uk-transition-opaque" href="img/galleryImage8.jpg" data-caption="Caption 8">
                            <img loading="lazy" src="img/galleryImage8-min.jpg" alt="galleryImage8">
                        </a>
                    </div>
                    <div class="uk-inline-clip uk-transition-toggle uk-margin-bottom" tabindex="0" data-group='BVMTalks'>
                        <a class="uk-inline uk-transition-scale-up uk-transition-opaque" href="img/galleryImage9.jpg" data-caption="Caption 9">
                            <img loading="lazy" src="img/galleryImage9-min.jpg" alt="galleryImage9">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-container uk-margin-top"><hr class="uk-divider-icon"></div>

    <div class="uk-container uk-margin-xlarge-right uk-margin-xlarge-left uk-margin-remove@s" id="venue">
        <h1 class="uk-h1 uk-margin-medium-top uk-bold"><span class="seccol">Venue</span></h1>
        <div class="uk-margin-bottom spectfont">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </div>
        <div id="map" class="uk-placeholder uk-flex uk-flex-center uk-flex-middle" style="width:100%;height:400px;" class="">Map</div>
    </div>

    <div class="uk-container uk-margin-top"><hr class="uk-divider-icon"></div>

    <div class="uk-container uk-margin-xlarge-right uk-margin-xlarge-left uk-margin-remove@s">
        <div class="uk-child-width-1-2 uk-padding-large uk-text-center" uk-grid>
            <div>
                <a href="#"><img src="img/logo@s.png" width="150" uk-img></a>
            </div>
            <div>
                <a href="#"><img src="img/bvm-logo.png" width="150" uk-img></a>
            </div>
        </div>    
    </div>

    <div id="uk-bg-seccol">
        <div class="uk-container uk-margin-xlarge-right uk-margin-xlarge-left uk-margin-remove@s" id="contact">
            <div class="uk-text-center uk-padding-small"><a href="#" uk-scroll><span class="fa fa-chevron-up"></span></a></div>
            <div class="uk-child-width-1-2@m uk-padding" uk-grid>
                <div>
                    <div>
                        <h4 class="uk-h4 uk-text-muted">Links</h4>
                        <div>
                            <ul class="uk-list">
                                <li><a href="#speakers" uk-scroll>Speakers</a></li>
                                <li><a href="#schedule" uk-scroll>Schedule</a></li>
                                <li><a href="#gallery_" uk-scroll>Gallery</a></li>
                                <li><a href="#venue" uk-scroll>Venue</a></li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <h4 class="uk-h4 uk-text-muted">About BVM Talks</h4>
                        <div>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                    </div>
                </div>
                <div>
                   <div>
                        <h4 class="uk-h4 uk-text-muted">Contact</h4>
                        <div>
                            BVM Engineering college,<br>
                            Vallbh Vidhyanagar<br>
                            Anand - 388120<br>
                            <div class="uk-margin-top uk-margin-bottom">
                                <a href="#">bvmenginnering.ac@mail.com</a>
                            </div>
                        </div>
                   </div>
                   <div>
                        <h4 class="uk-h4 uk-text-muted">Follow</h4>
                        <div>
                            <a href="#" class="uk-icon-button uk-margin-small-right"><span class="fab fa-twitter"></span></a>
                            <a href="#" class="uk-icon-button uk-margin-small-right"><span class="fab fa-dribbble"></span></a>
                            <a href="#" class="uk-icon-button uk-margin-small-right"><span class="fab fa-instagram"></span></a>
                            <a href="#" class="uk-icon-button"><span class="fab fa-github"></span></a>
                        </div>
                   </div>
                </div>
            </div>
            <hr />
            <div class="uk-text-center">&copy; Copyright <script>document.write(new Date().getFullYear())</script> BVM college</div>
        </div>    
    </div>

    <a href="#" id="back-to-top" uk-scroll><span class="fa fa-chevron-up"></span></a>
    
    <script src="js/uikit.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/index.js"></script>
    <script src="js/fontawesome.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfy1qbaakwkTHwznVgPXtNPPHHVmBsBsE&callback=initMap" type="text/javascript"></script>
    <script>
        $(window).on('load', function(){
            $('.load-frame').fadeOut();
        });
    </script>
</body>

</html>