<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text-primary font-secondary">Наш блог</h2>
            <h1 class="display-4 text-uppercase">Категории</h1>
        </div>
        <div class="row g-5">

            <?php
            foreach ($data['categories'] as $key => $category) { ?>
                <div class="col-lg-4 col-md-6">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?= $category['imgSrc'] ?>"
                                 alt="<?= $category['imgAlt'] ?>">
                        </div>
                        <div class="bg-dark border-inner text-center p-4">
                            <h4 class="text-uppercase text-primary"><a
                                        href="/post/allPostsByCategory?slug=<?= $category['slug'] ?>"><?= $category['category'] ?></a>
                            </h4>
                            <p class="text-white m-0"><?= $category['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Team End -->