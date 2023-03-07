<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/controlpanel/static/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="/controlpanel/static/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/controlpanel/static/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/controlpanel/static/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/controlpanel/static/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/controlpanel/static/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/controlpanel/static/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/controlpanel/static/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="/controlpanel/static/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
             height="60" width="60">
    </div>

    <!-- Navbar -->
    <?php require_once ADM_VIEWS_PATH . "header.php"; ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php require_once ADM_VIEWS_PATH . "sidebar.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <?php if (!empty($data['success'])) { ?>
        <div class="alert alert-success text-center" role="alert">
            <?= $data['success'] ?>
        </div>
    <?php } ?>
    <?php if (!empty($data['error'])) { ?>
        <div class="alert alert-danger text-center" role="alert">
            <?= $data['error'] ?>
        </div>
    <?php } ?>
    <?php if (!empty($data['message'])) { ?>
        <div class="alert alert-primary text-center" role="alert">
            <?= $data['message'] ?>
        </div>
    <?php } ?>
    <?php require_once $contentView; ?>
    <!-- /.content-wrapper -->
    <?php require_once ADM_VIEWS_PATH . "footer.php"; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/controlpanel/static/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/controlpanel/static/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/controlpanel/static/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/controlpanel/static/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/controlpanel/static/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/controlpanel/static/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/controlpanel/static/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/controlpanel/static/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/controlpanel/static/plugins/moment/moment.min.js"></script>
<script src="/controlpanel/static/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/controlpanel/static/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/controlpanel/static/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/controlpanel/static/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/controlpanel/static/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/controlpanel/static/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/controlpanel/static/dist/js/pages/dashboard.js"></script>
</body>
</html>
