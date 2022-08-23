<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= (isset($title)) ? $title :  WEBSITE_NAME; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/adminlte.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/self/style.css">
</head>

<body class="hold-transition login-page">
    <?php
    $email    =    '';
    $password    =    '';
    $remember    =    '';

    if (get_cookie('email', FALSE) != NULL) {
        $email    =    get_cookie('email', FALSE);
    }
    if (get_cookie('password', FALSE) != NULL) {
        $password    =    get_cookie('password', FALSE);
    }
    if (get_cookie('remember', FALSE) != NULL) {
        $remember    =    get_cookie('remember', FALSE);
    }

    $email_decr    =    custom_encryption($email, 'ak!@#s$on!', 'decrypt');
    $password_decr    =    custom_encryption($password, 'ak!@#s$on!', 'decrypt');
    ?>
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <?= get_flashdata() ?>
                <p class="login-box-msg">
                    <a href="javascript:void(0);" title=""><img src="<?= base_url() ?>dist/images/logo.png" /></a>
                </p>
                <div class="login-logo">
                    <h4 class="fw-300 c-grey-900 mB-30" style="font-weight:bold !important;font-size: 25px;color: #1a7fd0 !important; text-align:center">C R Industries </h4>
                </div>

                <form method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="E-Mail" name="email" value="<?php if ($remember && $email_decr != '') {
                                                                                                                echo $email_decr;
                                                                                                            } ?>" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <span class="error"><?= form_error('email') ?></span>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" value="<?php if ($remember && $password_decr != '') {
                                                                                                                        echo $password_decr;
                                                                                                                    } ?>" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span class="error"><?= form_error('password') ?></span>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" value="1" <?= (@$remember) ? "checked='true'" : "" ?>>
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                    </div>
                    <div class="social-auth-links text-center mb-3">
                        <button type="submit" class="btn btn-block btn-primary">Sign in</button>
                    </div>
                </form>

                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="<?php echo base_url(); ?>/">I forgot my password</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
</body>

</html>