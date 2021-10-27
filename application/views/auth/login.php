<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from www.wrappixel.com/demos/admin-templates/material-pro/minisidebar/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Feb 2019 11:15:50 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/icon-plus.png">
    <title>Material Pro Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url() ?>assets/material-pro/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?= base_url() ?>assets/material-pro/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/material-pro/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/material-pro/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="<?= base_url() ?>assets/material-pro/assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/material-pro/minisidebar/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url() ?>assets/material-pro/minisidebar/css/colors/blue.css" id="theme" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-color: #EEF5F9">
            <div class="text-center">
                <img style="width: 200px" src="<?= base_url(); ?>assets/images/login-logo.png" class="img-fluid m-b-20" alt="icon-plus">
            </div>
            <form action="<?= site_url('login/proses') ?>" method="post">
                <div class="login-box card" style="background-color: #1E88E5">
                    <div class="card-body">
                        <?php if (!empty($_SESSION['login_message'])) : ?>
                            <div class="alert alert-danger">
                                <p><?= $_SESSION['login_message'] ?></p>
                            </div>
                        <?php endif ?>
                        <div class="form-group <?= form_error('email') ? 'has-error' : null ?>">
                            <div class="col-sm">
                                <label style="color: white">Email</label>
                                <input type="email" name=email class="form-control" placeholder="Email">
                                <span style="color: white"><?= form_error('email') ?></span>
                            </div>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                            <div class="col-sm">
                                <label style="color: white">Password</label>
                                <input class="form-control" name=password type="password" placeholder="Password">
                                <span style="color: white"><?= form_error('password') ?></span>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-light me-md-5" name="login" type="submit">Login</button>
                            <!--<button class="btn btn-primary" type="button">Button</button>-->
                        </div>
            </form>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script data-cfasync="false" src="../../../../cloudflare-static/email-decode.min.js"></script>
    <script src="<?= base_url() ?>assets/material-pro/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url() ?>assets/material-pro/assets/plugins/popper/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/material-pro/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url() ?>assets/material-pro/minisidebar/js/jquery.slimscroll.js"></script>

    <!--Wave Effects -->
    <script src="<?= base_url() ?>assets/material-pro/minisidebar/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url() ?>assets/material-pro/minisidebar/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?= base_url() ?>assets/material-pro/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?= base_url() ?>assets/material-pro/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= base_url() ?>assets/material-pro/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url() ?>assets/material-pro/minisidebar/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="<?= base_url() ?>assets/material-pro/assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="<?= base_url() ?>assets/material-pro/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="<?= base_url() ?>assets/material-pro/assets/plugins/d3/d3.min.js"></script>
    <script src="<?= base_url() ?>assets/material-pro/assets/plugins/c3-master/c3.min.js"></script>
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?= base_url() ?>assets/material-pro/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- Chart JS asdas-->
    <script src="<?= base_url() ?>assets/js/custom-crm.js"></script>
    <!-- ============================================================== -->
</body>


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/material-pro/minisidebar/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Feb 2019 11:15:51 GMT -->

</html>