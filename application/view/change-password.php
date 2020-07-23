<?php include('Layouts/header.php');?>
<body>
<link rel="stylesheet" href="<?php $this->asset('css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?php $this->asset('css/loginpagestyle.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
        <div class="card login-page-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="<?php $this->asset('image/login/people-watching-video-on-smartphon-gettyimages-youtube.jpg') ?>"
                         alt="login-page" class="login-page-card-img">
                </div>

                <div class="col-md-7">
                    <div class="card-body">
                        <div class="brand-wrapper">
                            
                            <img src="<?php $this->asset('image/login/logo.png') ?>" alt="logo" class="logo">
                        </div>
                        <p class="login-page-card-description">تغییر رمز عبور</p>

                        <form action="<?php $this->url('User/changeUserPassword'); ?>" method="post">

                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <div class="inner-addon right-addon">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" name="currentPassword" id="currentPassword" class="form-control"
                                           placeholder="رمز عبور  فعلی">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <div class="inner-addon right-addon">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" name="newPassword" id="newPassword" class="form-control"
                                           placeholder="رمز عبور جدید">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <div class="inner-addon right-addon">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" name="repeatNewPassword" id="repeatNewPassword" class="form-control"
                                           placeholder="تکرار رمز جدید عبور">
                                </div>
                            </div>

                            <input name="login-page" id="login-page" class="btn btn-block login-page-btn mb-4"
                                   type="submit" value="ثبت">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include('Layouts/footer.php');?>