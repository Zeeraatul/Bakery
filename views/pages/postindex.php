<div class="container py-5">
    <div class="row g-5">
        <!-- Blog list Start -->
        <div class="col-lg-8">
            <?php
            $post = $data['posts'];
            $page = $_GET['page'];
            $post_count = 4;
            $pages_count = floor(count($data['posts']) / $post_count);

            for($i = $page*$post_count; $i < ($page + 1)*$post_count; $i++) {
                if($post[$i] != NULL) {
                ?>
                <div class="blog-item mb-5">
                    <div class="row g-0 bg-light overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid h-100" src="<?= $post[$i]['imgSrc'] ?>" alt="<?= $post[$i]['imgAlt'] ?>"
                                style="object-fit: cover;">
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column justify-content-center">
                            <div class="p-4">
                                <div class="d-flex mb-3">
                                    <small class="me-3"><i class="bi bi-bookmarks me-2"></i><?= $post[$i]['category'] ?>
                                    </small>
                                    <small><i class="bi bi-calendar-date me-2"></i><?= (new DateTime($post[$i]['dateOfPublished']))->Format('d.m.Y') ?>
                                    </small>
                                </div>
                                <h5 class="text-uppercase mb-3"><?= $post[$i]['title'] ?></h5>
                                <p><?= $post[$i]['slogan'] ?></p>
                                <a class="text-primary text-uppercase"
                                   href="/post/getOnePost?slug=<?= $post[$i]['slug'] ?>">Узнать больше...<i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else break;
            
            } ?>
            <div class="col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-lg m-0">
                        <li class="page-item disabled">
                            <a class="page-link rounded-0" href="#" aria-label="Previous">
                                <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                            </a>
                        </li>
                        <?php
                        for($i = 0; $i <= $pages_count; $i++) { ?>
                            <li class="page-item active"><a class="page-link" href="/post/allPosts?page=<?= $i ?>"><?php echo $i + 1; ?></a></li>
                        <?php } ?>
                        <li class="page-item">
                            <a class="page-link rounded-0" href="#" aria-label="Next">
                                <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Blog list End -->

        <!-- Sidebar Start -->
        <div class="col-lg-4">
            <!-- Search Form Start -->
            <div class="mb-5">
                <div class="input-group">
                    <input type="text" class="form-control p-3" placeholder="Keyword">
                    <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                </div>
            </div>
            <!-- Search Form End -->

            <!-- Category Start -->
            <div class="mb-5">
                <h3 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Категории:</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="h5 bg-light py-2 px-3 mb-2"
                       href="/post/"><i class="bi bi-arrow-right me-2"></i>Все записи</a>
                    <?php
                    foreach ($data['categories'] as $key => $cat) {
                        ?>
                        <a class="h5 bg-light py-2 px-3 mb-2"
                           href="/post/allPostsByCategory?slug=<?= $cat['slug'] ?>"><i
                                    class="bi bi-arrow-right me-2"></i><?= $cat['category'] ?></a>
                    <? } ?>
                </div>
            </div>
            <!-- Category End -->

            <!-- Image Start -->
            <div class="mb-5">
                <img src="img/blog-1.jpg" alt="" class="img-fluid rounded">
            </div>
            <!-- Image End -->

            <!-- Tags Start -->
            <div class="mb-5">
                <h3 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Ключевые Теги</h3>
                <div class="d-flex flex-wrap m-n1">
                    <?php
                    foreach ($data['tags'] as $key => $tag) {
                    ?>
                        <a href="/post/allPostsByTag?slug=<?= $tag['tag'] ?>" class="btn btn-primary m-1"><?= $tag['tag'] ?></a>
                    <? } ?>
                </div>
            </div>
            <!-- Tags End -->
        </div>
        <!-- Sidebar End -->
    </div>
</div>