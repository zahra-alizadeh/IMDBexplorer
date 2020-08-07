<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">
<head>
    <!-- Basic need -->
    <title>دنیای فیلم و سریال</title>
    <link rel="icon" href="<?php $this->asset('image/imdb_logo.png') ?>" type="image/x-icon">
    <meta name="description" content="فیلم و سریال از بهترین سایت دانلود فیلم بهمراه جدیدترین فیلم های ایرانی  imdb">
    <meta name="keywords"
          content="پخش تریلر فیلم,فیلم,season,video, movie, film,online,تماشای آنلاین,فیل ,,فیلم های کمدی,جدیدترین فیلم ها,فیلم های جدید,بهترین فیلم,فیلم جدید,سریا,">
    <meta name="author" content="TEAM IMDB">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="profile" href="#">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone-no">
    <!-- Mobile specific meta -->
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone-no">

    <!-- Mobile specific meta -->
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone-no">

    <link rel="stylesheet" href="<?php $this->asset('css/style.css') ?>">
    <link rel="stylesheet" href="<?php $this->asset('css/plugins.css') ?>">
    <link rel="stylesheet" href="<?php $this->asset('css/header.css') ?>">
</head>
<!--preloading-->
<div id="preloader">
                     <a class="jss17">
                        <button class="MuiButtonBase-root MuiIconButton-root jss14 MuiIconButton-colorInherit MuiIconButton-edgeStart"
                                tabindex="0" type="button" aria-label="open drawer">
							<span class="MuiIconButton-label-logo logo-img" >
								<img src="<?php $this->asset('image/logo.png') ?>" style="width: 300px;">
							</span>
                            <span class="MuiTouchRipple-root"></span>
                        </button>
                        
                    </a>
     <div id="status">
        <span></span>
        <span></span>
    </div>
</div>
<!--end of preloading-->
<!-- BEGIN | Header -->
<header class="ht-header  bodydirection">
	<div class="container-header">
		<nav class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
				    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
				    </div>
				    <a class="a-width" href="index_light.html"><img class="logo" src="<?php $this->asset('image/logo.png') ?>"></a>
			    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						 <li class="dropdown first">
                            <a class="jss11" href="<?php $this->url('Movie/movies'); ?>">فیلم ها</a>
						</li>
						<li class="dropdown first">
                        <a class="jss11" href="<?php $this->url('Person/actors'); ?>">بازیگران</a>
						</li>
						<li class="dropdown first">
                        <a class="jss11" href="<?php $this->url('Blog/blogs'); ?>">اخبار</a>
                        </li> 
					</ul>
				    <!-- top search form -->  
                    <ul class="nav navbar-nav flex-child-menu menu-left">
                       <div class="top-search" style="margin-top: 10px; margin-right: 50px;">
                         <a class="jss17" style="margin-right: 15px;">
                                <button
                                     class="MuiButtonBase-root MuiIconButton-root jss14 MuiIconButton-colorInherit MuiIconButton-edgeStart"
                                    tabindex="0" type="button" aria-label="open drawer">
								<span class="MuiIconButton-label">
									<img src="<?php $this->asset('image/search.png') ?>">
								</span>
                                 <span class="MuiTouchRipple-root"></span>
                               </button>
                           </a>
                         <input type="text" placeholder="دنبال چی میگردی؟" style="width: 600px;height:35px ;">
                        </div>
                    </ul> 
                    <!-- top search form -->
                    </ul>
                    <ul class="nav navbar-nav flex-child-menu menu-right">
						<li class="dropdown first">
                        <div class="jss74" style="direction: ltr;">
                        <?php if (isset($_SESSION['userId']) and $_SESSION['loggedIn'] == true) { ?>
                            <button class="MuiButtonBase-root MuiButton-root MuiButton-text jss75"tabindex="0" type="button">
                                <a class="btn btn-default  lv1"
                                       href="<?php $this->url('User/logout'); ?>">خروج</a>
                                    
                            </button>
                            <button class="MuiButtonBase-root MuiButton-root MuiButton-text jss75"tabindex="0" type="button">
                                
                            <a>|</a>
                            <a class="btn btn-default  lv1"
                                       href="<?php $this->url('UserProfile/profile'); ?>"><?php echo $_SESSION['userName']; ?></a>
                                    
                            </button>
                            <?php } else if (!isset($_SESSION['userId'])) { ?>
                                <button class="MuiButtonBase-root MuiButton-root MuiButton-text jss75"tabindex="0" type="button">
                                    <a class="btn btn-default  lv1"
                                       href="<?php $this->url('User/login') ?>">ورود</a>
                                </button>
                                <button class="MuiButtonBase-root MuiButton-root MuiButton-text jss75"tabindex="0" type="button">
                                <a >|</a>
                                    <a class="btn btn-default  lv1"
                                       href="<?php $this->url('User/registration') ?>">ثبت ‌نام</a>
                                </button>
                            <?php } ?>
                        </div>
						</li>                
					</ul>
				</div>
			<!-- /.navbar-collapse -->
	    </nav>
	</div>
</header>
