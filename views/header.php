<!-- Topbar Start -->
<div class="container-fluid px-0 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-4 text-center bg-secondary py-3">
            <div class="d-inline-flex align-items-center justify-content-center">
                <i class="bi bi-envelope fs-1 text-primary me-3"></i>
                <div class="text-start">
                    <h6 class="text-uppercase mb-1">Email</h6>
                    <span><?= $data['options']['email']['value'] ?></span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center bg-primary border-inner py-3">
            <div class="d-inline-flex align-items-center justify-content-center">
                <a href="/" class="navbar-brand">
                    <h1 class="m-0 text-uppercase text-white">
                        <img class="fa fa-birthday-cake logo fs-1 text-dark me-3"
                             src="<?= $data['options']['logo']['value'] ?>">
                        <?= $data['options']['title']['value'] ?>
                    </h1>
                </a>
            </div>
        </div>
        <div class="col-lg-4 text-center bg-secondary py-3">
            <div class="d-inline-flex align-items-center justify-content-center">
                <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                <div class="text-start">
                    <h6 class="text-uppercase mb-1">Связаться с нами</h6>
                    <span><?= $data['options']['phone']['value'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
    <a href="index.html" class="navbar-brand d-block d-lg-none">
        <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-primary me-3"></i>CakeZone
        </h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto mx-lg-auto py-0">
            <?php
            $navigate = $data['navigate'];
            foreach ($navigate as $key => $value) {
                if (count($value['childs']) == 0) {
                    // нету дочерних элементов - не выпадающий список
                    ?>
                    <a href="<?= $value['href'] ?>" class="nav-item nav-link active"><?= $value['title'] ?></a>
                    <?php
                } else {                    // выпадающий список
                    ?>
                    <div class="nav-item dropdown">
                        <a href="<?= $value['href'] ?>" class="nav-link dropdown-toggle"
                           data-bs-toggle="dropdown"><?= $value['title'] ?></a>
                        <div class="dropdown-menu m-0">
                            <?php
                            foreach ($value['childs'] as $childIndex => $child) { ?>
                                <a href="<?= $child['href'] ?>" class="dropdown-item"><?= $child['title'] ?></a>
                            <?php }
                            ?>
                        </div>
                    </div>
                <?php }
            }
            ?>
        </div>
    </div>
</nav>
<!-- Navbar End -->