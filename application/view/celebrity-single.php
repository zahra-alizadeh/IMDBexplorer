<!DOCTYPE html>

<html lang="fa" class="no-js">


<head>
    <title>دنیای فیلم و سریال</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="profile" href="#">
    <link rel="icon" href="<?php $this->asset('image/login/imdb_logo.png') ?>" type="image/x-icon">
    <!-- <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' /> -->
    <!-- Mobile specific meta -->
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone-no">

    <!-- CSS files -->
    
    <link rel="stylesheet" href="<?php $this->asset('css/plugins.css') ?>">
    <link rel="stylesheet" href="<?php $this->asset('css/style.css') ?>">
    <link rel="stylesheet" href="<?php $this->asset('css/footer.css') ?>">
    <link rel="stylesheet" href="<?php $this->asset('css/footer.css') ?>">

</head>

<body>
    <!--preloading-->
    <div id="preloader">
        <img class="logo" src="<?php $this->asset('image/login/logo.png') ?>" alt="" width="119" height="58">
        <div id="status">
            <span></span>
            <span></span>
        </div>
    </div>
    <!--end of preloading-->

    <!-- BEGIN | Header -->
    <header class="ht-header">
        <div class="container">
            <nav class="navbar navbar-default navbar-custom">
                <div style="direction: rtl;background-color: black;" class="MuiPaper-root MuiAppBar-root MuiAppBar-positionStatic MuiAppBar-colorPrimary jss2 MuiPaper-elevation4">
                    <div class="MuiToolbar-root MuiToolbar-regular MuiToolbar-gutters">
                        <a class="jss17">
                            <button class="MuiButtonBase-root MuiIconButton-root jss14 MuiIconButton-colorInherit MuiIconButton-edgeStart" tabindex="0" type="button" aria-label="open drawer">
                                <span class="MuiIconButton-label">
                                    <img src="<?php $this->asset('image/login/logo.png') ?>">
                                </span>
                                <span class="MuiTouchRipple-root"></span>
                            </button>
                        </a>
                        <div class="jss8">
                            <div>
                                <a class="jss11">دسته بندی ها </a>
                                <a class="jss11">فیلم</a>
                                <a class="jss11">سریال</a>
                                <a class="jss11">بازیگران</a>
                                <a class="jss11">درباره ما </a>
                            </div>
                        </div>
                        <!-- top search form -->
                        <!-- top search form -->
                        <div class="top-search" style="margin-top: 10px; margin-right: 50px;">
                            <select style="direction: rtl;margin-left: 5px;">
                               <option value="united">فیلم ها</option>
                               <option value="saab">بازیگران</option>
                               <option value="saab">کارگردان ها</option>
                               <option value="saab">اخبار</option>
                            </select>
                            <input type="text" placeholder="جستجو" style="width: 600px;">
                        </div>
                        <div class="jss4" style="direction: ltr;">
                            <div class="jss74" style="direction: ltr;">
                                <button class="MuiButtonBase-root MuiButton-root MuiButton-text jss75" tabindex="0" type="button">
                                    <a class="MuiButton-label" style="color: white;" href="<?php $this->url('User/login'); ?>">ورود</a>
                                    <span class="MuiTouchRipple-root"></span>
                                </button>
                                <a class="MuiButton-label" style="color: white;">/</a>
                                <button class="MuiButtonBase-root MuiButton-root MuiButton-text jss75" tabindex="0" type="button">
                                    <a class="MuiButton-label" style="color: white;" href="<?php $this->url('User/registration'); ?>">ثبت‌نام</a>
                                    <span class="MuiTouchRipple-root"></span>
                                </button>
                            </div>
                            <a class="jss15"></a>
                        </div>
                        <div class="jss9">
                            <button class="MuiButtonBase-root MuiIconButton-root jss13 MuiIconButton-colorInherit" tabindex="0" type="button" aria-label="show more" aria-controls="primary-search-account-menu-mobile" aria-haspopup="true">
                                <span class="MuiIconButton-label">
                                    <svg class="MuiSvgIcon-root" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
                                    </svg>
                                </span>
                                <span class="MuiTouchRipple-root"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- END | Header -->

    <div class="buster-light">
        <div class="hero hero3">
            <div class="container">
            </div>
        </div>

        <!-- celebrity single section-->

        <div class="page-single movie-single cebleb-single">
            <div class="container">
                <div class="row ipad-width">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="movie-single-ct">
                            <h1 class="bd-hd"><?php echo $actor["first_name"]; ?></h1>
                            <div class="social-link cebsingle-socail">
                                <a href="#"><i class="ion-social-facebook"></i></a>
                                <a href="#"><i class="ion-social-twitter"></i></a>
                                <a href="#"><i class="ion-social-googleplus"></i></a>
                                <a href="#"><i class="ion-social-linkedin"></i></a>
                            </div>
                            <div class="movie-tabs">
                                <div class="tabs">
                                    <ul class="tab-links tabs-mv">
                                        <li class="active"><a href="#overviewceb">در یک نگاه</a></li>
                                        <!-- <li><a href="#biography"> زندگی نامه</a></li>
                                        <li><a href="#mediaceb">رسانه</a></li>
                                        <li><a href="#filmography">filmography</a></li> -->
                                    </ul>
                                    <div class="tab-content">
                                        <div id="overviewceb" class="tab active">
                                            <div class="row">
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="sb-it">
                                                        <h6> نام و نام خانوادگی </h6>
                                                        <p><a href="#"><?php echo $actor['first_name'] ; ?>></a></p>
                                                    </div>
                                                    <div class="sb-it">
                                                        <h6> تولد تاریخ </h6>
                                                        <p><?php echo $actor['birth_date'] ; ?></p>
                                                    </div>
                                                    <div class="sb-it">
                                                        <h6>زادگاه</h6>
                                                        <p><?php echo $actor['birth_place'] ; ?></p>
                                                    </div>

                                                </div>
                                                <div class="col-md-8 col-sm-12 col-xs-12">
                                                    <p><?php echo $actor['bio'] ; ?></p>

                                                    <!-- <p class="time"><a href="#biography">مشاهده کامل<i class="ion-ios-arrow-left"></i></a></p> -->
                                                    <div class="title-hd-sm">
                                                        <h4>Videos & Photos</h4>
                                                        <a href="#" class="time">All 5 Videos & 245 Photos <i class="ion-ios-arrow-left"></i></a>
                                                    </div>
                                                    <div class="mvsingle-item ov-item">
                                                        <a class="img-lightbox" data-fancybox-group="gallery" href="images/uploads/image11.jpg"><img src="images/uploads/image1.jpg" alt=""></a>
                                                        <a class="img-lightbox" data-fancybox-group="gallery" href="images/uploads/image21.jpg"><img src="images/uploads/image2.jpg" alt=""></a>
                                                        <a class="img-lightbox" data-fancybox-group="gallery" href="images/uploads/image31.jpg"><img src="images/uploads/image3.jpg" alt=""></a>
                                                        <div class="vd-it">
                                                            <img class="vd-img" src="images/uploads/image4.jpg" alt="">
                                                            <a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="title-hd-sm">
                                                        <h4>filmography</h4>
                                                        <a href="#" class="time">Full Filmography<i class="ion-ios-arrow-left"></i></a>
                                                    </div>
                                                    <!-- movie cast -->
                                                    <div class="mvcast-item">
                                                        <div class="cast-it">
                                                            <div class="cast-left cebleb-film">
                                                                <img src="images/uploads/film1.jpg" alt="">
                                                                <div>
                                                                    <a href="#">X-Men: Apocalypse </a>
                                                                    <p class="time">Logan</p>
                                                                </div>

                                                            </div>
                                                            <p> 2016</p>
                                                        </div>
                                                        <div class="cast-it">
                                                            <div class="cast-left cebleb-film">
                                                                <img src="images/uploads/film2.jpg" alt="">
                                                                <div>
                                                                    <a href="#">Eddie the Eagle </a>
                                                                    <p class="time">Bronson Peary</p>
                                                                </div>
                                                            </div>
                                                            <p> 2015</p>
                                                        </div>
                                                        <div class="cast-it">
                                                            <div class="cast-left cebleb-film">
                                                                <img src="images/uploads/film3.jpg" alt="">
                                                                <div>
                                                                    <a href="#">Me and Earl and the Dying Girl </a>
                                                                    <p class="time">هومن سیدی</p>
                                                                </div>
                                                            </div>
                                                            <p> 2015</p>
                                                        </div>
                                                        <div class="cast-it">
                                                            <div class="cast-left cebleb-film">
                                                                <img src="images/uploads/film4.jpg" alt="">
                                                                <div>
                                                                    <a href="#">Night at the Museum 3 </a>
                                                                    <p class="time">Blackbeard</p>
                                                                </div>
                                                            </div>
                                                            <p> 2014</p>
                                                        </div>
                                                        <div class="cast-it">
                                                            <div class="cast-left cebleb-film">
                                                                <img src="images/uploads/film5.jpg" alt="">
                                                                <div>
                                                                    <a href="#">X-Men: Days of Future Past </a>
                                                                    <p class="time">Wolverine</p>
                                                                </div>
                                                            </div>
                                                            <p> 2012</p>
                                                        </div>
                                                        <div class="cast-it">
                                                            <div class="cast-left cebleb-film">
                                                                <img src="images/uploads/film6.jpg" alt="">
                                                                <div>
                                                                    <a href="#">The Wolverine </a>
                                                                    <p class="time">Logan</p>
                                                                </div>
                                                            </div>
                                                            <p> 2011</p>
                                                        </div>
                                                        <div class="cast-it">
                                                            <div class="cast-left cebleb-film">
                                                                <img src="images/uploads/film7.jpg" alt="">
                                                                <div>
                                                                    <a href="#">Rise of the Guardians </a>
                                                                    <p class="time">Bunny</p>
                                                                </div>
                                                            </div>
                                                            <p> 2011</p>
                                                        </div>
                                                        <div class="cast-it">
                                                            <div class="cast-left cebleb-film">
                                                                <img src="images/uploads/film8.jpg" alt="">
                                                                <div>
                                                                    <a href="#">The Prestige </a>
                                                                    <p class="time">Robert Angier</p>
                                                                </div>
                                                            </div>
                                                            <p> 2010</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="mv-ceb">
                            <img src="images/uploads/cebsingle2.png" alt="">
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>


    <!-- footer section-->
    <footer id="footer" class="footer-1">
        <div class="main-footer widgets-dark typo-light">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="widget no-box">
                            <h5 class="widget-title">Contact Us<span></span></h5>

                            <div class="social-link cebsingle-socail">
                                <a href="#"><i class="ion-social-facebook"></i></a>
                                <a href="#"><i class="ion-social-twitter"></i></a>
                                <a href="#"><i class="ion-social-googleplus"></i></a>
                                <a href="#"><i class="ion-social-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="widget no-box">
                            <h5 class="widget-title">Get Started<span></span></h5>
                            <p>Get access to your full Training and Marketing Suite.</p>
                            <a class="btn" href="#." target="_blank">Register Now</a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="widget no-box">
                            <h5 class="widget-title">Quick Links<span></span></h5>
                            <ul class="thumbnail-widget">
                                <li>
                                    <div class="thumb-content"><a href="#.">Get Started</a></div>
                                </li>
                                <li>
                                    <div class="thumb-content"><a href="#.">Top Leaders</a></div>
                                </li>
                                <li>
                                    <div class="thumb-content"><a href="#.">Success Stories</a></div>
                                </li>
                                <li>
                                    <div class="thumb-content"><a href="#.">Event/Tickets</a></div>
                                </li>
                                <li>
                                    <div class="thumb-content"><a href="#.">News</a></div>
                                </li>
                                <li>
                                    <div class="thumb-content"><a href="#.">Lifestyle</a></div>
                                </li>
                                <li>
                                    <div class="thumb-content"><a href="#.">About</a></div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="widget subscribe no-box">
                            <h5 class="widget-title">COMPANY NAME<span></span></h5>
                            <p>About the company, little discription will goes here.. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>Copyright Company Name © 2016. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end of footer section-->

    <script src="<?php $this->asset('js/jquery.js') ?>"></script>
    <script src="<?php $this->asset('js/plugins.js') ?>"></script>
    <script src="<?php $this->asset('js/plugins2.js') ?>"></script>
    <script src="<?php $this->asset('js/custom.js') ?>"></script>
</body>



</html>