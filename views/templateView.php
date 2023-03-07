<!DOCTYPE html>
<html lang="<?= $data['options']['lang']['value'] ?>">
<head>
    <meta charset="utf-8">
    <title><?= $data['options']['title']['value'] ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="<?= $data['options']['description']['value'] ?>" name="description">

    <!-- Favicon -->
    <link href="/static/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/static/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/static/css/style.css" rel="stylesheet">
</head>

<body>
    <?php require_once VIEWS_PATH."header".EXT; ?>

    <?php if(!empty($data['success'])) { ?>
        <div class="alert alert-success text-center" role="alert">
            <?= $data['success'] ?>
        </div>
    <?php } ?>
    <?php if(!empty($data['error'])) { ?>
        <div class="alert alert-danger text-center" role="alert">
            <?= $data['error'] ?>
        </div>
    <?php } ?>
    <?php if(!empty($data['message'])) { ?>
        <div class="alert alert-primary text-center" role="alert">
            <?= $data['message'] ?>
        </div>
    <?php } ?>

    <?php require_once $contentView; ?>

    <?php require_once VIEWS_PATH."footer".EXT; ?>

<!-- Back to Top -->
<a href="#" class="btn btn-primary border-inner py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/static/lib/easing/easing.min.js"></script>
<script src="/static/lib/waypoints/waypoints.min.js"></script>
<script src="/static/lib/counterup/counterup.min.js"></script>
<script src="/static/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="/static/js/main.js"></script>
</body>

</html>


