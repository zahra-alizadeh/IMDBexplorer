<?php include('Layouts/header.php'); ?>

    <body class="bodydirection">
    <div class="buster-light">
        <div class="hero hero3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>

        <div class="page-single movie-single cebleb-single">
            <div class="container">
                <div class="row ipad-width">
                    <div class="col-md-4 col-md-4-c col-sm-12 col-xs-12">
                        <div class="mv-ceb mv-ceb-cel">
                            <img loading="lazy" src="<?php echo $director['director_picture']; ?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-8 col-md-8-c col-sm-12 col-xs-12">
                        <div class="movie-single-ct">
                            <div class=".social-btn  social-btn-actor">
                                <h1 class="bd-hd"><?php echo $director['first_name'] . " " . $director['last_name']; ?></h1>
                            </div>
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
                                                        <p><?php echo $director['first_name'] . " " . $director['last_name']; ?></p>
                                                    </div>
                                                    <div class="sb-it">
                                                        <h6> تولد تاریخ </h6>
                                                        <p><?php echo $director['birth_date']; ?></p>
                                                    </div>
                                                    <div class="sb-it">
                                                        <h6>زادگاه</h6>
                                                        <p><?php echo $director['birth_place']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-md-8-c col-sm-12 col-xs-12">
                                                    <p><?php echo $director['bio']; ?></p>
                                                    <div class="title-hd-sm">
                                                        <h4>عکس ها</h4>
                                                    </div>
                                                    <div class="mvsingle-item ov-item">
                                                        <?php foreach ($directorPictures as $directorPicture) { ?>
                                                            <a class="img-lightbox"
                                                               data-fancybox-group="gallery"
                                                               href="<?php echo $directorPicture['picture']; ?>">
                                                                <img loading="lazy"
                                                                        class="img-actor-size"
                                                                        src="<?php echo $directorPicture['picture']; ?>"
                                                                        alt=""></a>
                                                        <?php } ?>
                                                    </div>
                                                    <!-- movie cast -->
                                                    <div class="title-hd-sm">
                                                        <h4>فیلم ها</h4>
                                                    </div>
                                                    <div class="mvcast-item">
                                                        <?php foreach ($directorMovies

                                                                       as $directorMovie) { ?>
                                                            <div class="cast-it">
                                                                <div class="cast-left cebleb-film">

                                                                    <img loading="lazy" class="img-movie-size"
                                                                         src="<?php echo $directorMovie['picture']; ?>"
                                                                         alt="">
                                                                    <div>
                                                                        <a href="<?php $this->url('Movie/movie/' . $directorMovie['id']); ?>"><?php echo $directorMovie['movie_name']; ?></a>
                                                                    </div>
                                                                </div>
                                                                <p><?php echo $directorMovie['release_date']; ?></p>
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
            </div>
        </div>
    </div>
    </div>
    </body>

<?php include('Layouts/footer.php'); ?>