<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Админ панель | Аутентификация </title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/controlpanel/static/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/controlpanel/static/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/controlpanel/static/dist/css/adminlte.min.css">
</head>
<body>
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

<script src="/controlpanel/static/plugins/jquery/jquery.min.js"></script>
<script src="/controlpanel/static/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/controlpanel/static/dist/js/adminlte.min.js"></script>
</body>
</html>
