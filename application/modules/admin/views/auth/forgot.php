<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= (isset($title)) ? $title :  WEBSITE_NAME; ?></title>

    <!-- Header -->
    <?php $this->load->view('auth/auth_header') ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
           
            <div class="card-body">
                <?= get_flashdata() ?>
                <p class="login-box-msg">
                    <a href="javascript:void(0);" title=""><img src="<?= base_url() ?>dist/images/logo.png" /></a>
                </p>
                <div class="login-logo">
                    <h4 class="fw-300 c-grey-900 mB-30" style="font-weight:bold !important;font-size: 25px;color: #1a7fd0 !important; text-align:center">C R Industries </h4>
                </div>

                <form action="recover-password.html" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mt-3 mb-1">
                    <a href="<?php echo base_url(); ?>admin/auth/login">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- Footer -->
    <?php $this->load->view('auth/auth_footer') ?>
</body>

</html>