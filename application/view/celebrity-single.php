<?php include('Layouts/header.php'); ?>
    <!-- celebritysingle_light16:31-->
    <body>


    <div class="buster-light">
        <div class="hero hero3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <h1> movie listing - list</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="#">Home</a></li>
                            <li> <span class="ion-ios-arrow-right"></span> movie listing</li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- celebrity single section-->


        <div class="page-single movie-single cebleb-single">
            <div class="container">
                <div class="row ipad-width">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="movie-single-ct">
                            <div class=".social-btn  social-btn-actor">
                                <h1 class="bd-hd"><?php echo $actor['first_name'] . " " . $actor['last_name']; ?></h1>
                            </div>

                            <!-- <div class="social-link cebsingle-socail">
                                <a href="#"><i class="ion-social-facebook"></i></a>
                                <a href="#"><i class="ion-social-twitter"></i></a>
                                <a href="#"><i class="ion-social-googleplus"></i></a>
                                <a href="#"><i class="ion-social-linkedin"></i></a>
                            </div> -->
                            <div class="movie-tabs">
                                <div class="tabs">
                                    <ul class="tab-links tabs-mv-actor tabs-mv">
                                        <li class="active"><a href="#overviewceb">معرفی</a></li>

                                    </ul>
                                    <div class="tab-content">
                                        <div id="overviewceb" class="tab active">
                                            <div class="row">
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <div class="sb-it">
                                                        <h6> نام و نام خانوادگی </h6>
                                                        <p>
                                                        <p><?php echo $actor['first_name'] . " " . $actor['last_name']; ?></p></p>
                                                    </div>
                                                    <div class="sb-it">
                                                        <h6> تولد تاریخ </h6>
                                                        <p><?php echo $actor['birth_date']; ?></p>
                                                    </div>
                                                    <div class="sb-it">
                                                        <h6>زادگاه</h6>
                                                        <p><?php echo $actor['birth_place']; ?></p>
                                                    </div>

                                                </div>
                                                <div class="col-md-8 col-sm-12 col-xs-12">
                                                    <p><?php echo $actor['bio']; ?></p>
                                                    <!-- <p class="time"><a href="#biography">مشاهده کامل<i class="ion-ios-arrow-left"></i></a></p> -->
                                                    <div class="title-hd-sm">
                                                        <h4>عکس ها</h4>
                                                    </div>

                                                    <div class="mvsingle-item ov-item">
                                                        <?php foreach ($actorPictures as $actorPicture) { ?>
                                                            <a class="img-lightbox" data-fancybox-group="gallery"
                                                               href="<?php echo $actorPicture['picture']; ?>"><img
                                                                        src="<?php echo $actorPicture['picture']; ?>"
                                                                        alt=""></a>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="title-hd-sm">
                                                        <h4>فیلم ها</h4>
                                                    </div>
                                                    <!-- movie cast -->
                                                    <div class="mvcast-item">
                                                        <?php foreach ($actorMovies as $actorMovie) { ?>
                                                            <div class="cast-it">
                                                                <div class="cast-left cebleb-film">
                                                                    <img src="<?php echo $actorMovie['picture']; ?>"
                                                                         alt="">
                                                                    <div>
                                                                        <a href="#"><?php echo $actorMovie['movie_name']; ?></a>
                                                                        <p class="time"><?php echo $actorMovie['director']; ?></p>
                                                                    </div>

                                                                </div>
                                                                <p><?php echo $actorMovie['release_date']; ?></p>
                                                            </div>
                                                        <?php } ?>

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
                        <img src="<?php echo $actor['picture']; ?>" alt="">
                    </div>
                </div>

            </div>
        </div>


    </div>
    </div>
    <!-- celebrity single section-->

    </body>

    <!-- celebritysingle_light16:31-->
<?php include('Layouts/footer.php'); ?>