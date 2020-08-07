<?php include('Layouts/header.php'); ?>
    <script src="<?php $this->asset('js/alaki.js') ?>"></script>
    <body>
    <link rel="stylesheet" href="<?php $this->asset('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php $this->asset('css/loginpagestyle.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <main class="d-flex align-items-center align-item-center-authentication min-vh-100 py-3 py-md-0">
        <div class="container-authentication">
            <div class="card login-page-card-authentication ">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img loading="lazy" src="<?php $this->asset('image/login/logo.png') ?>" alt="logo"
                                     class="logo">
                            </div>
                            <p class="login-page-card-description">تاییدیه ایمیل</p>
                            <p>کد امنیتی ارسال شده به ایمیل خود را وارد کنید</p>

                            <form action="<?php $this->url('User/enterPassword'); ?>" method="post">

                                <div class="form-group">
                                    <label for="authentication" class="sr-only">authentication</label>
                                    <div class="inner-addon right-addon">
                                        <i class="fa fa-lock"></i>
                                        <input type="text" id="authentication" name="authentication"
                                               class="form-control"
                                               placeholder="کد امنیتی">
                                    </div>

                                    <input class="btn btn-block login-page-btn mb-4" type="submit" value="ثبت">
                            </form>

                            <p class="forget-password-card-footer-text"> در صورت دریافت نکردن ایمیل بر رو <a
                                        href="<?php $this->url('User/registration'); ?>" class="register"> ارسال مجدد
                                    ایمیل </a>کلیک کنید </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php include('Layouts/footer.php'); ?>