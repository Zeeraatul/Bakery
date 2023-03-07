<?php
$onePost = $data['onePost'];
?>
<link rel="stylesheet" href="/static/css/comments.css">
<div class="container py-5">
    <div class="row g-5">
        <div class="col-md-12">
            <p class="d-none postId"><?= $onePost['Id'] ?></p>
            <div class="mb-5 text-justify">
                <h1 class="text-uppercase text-center mb-4"><?= $onePost['title'] ?></h1>
                <img class="img-fluid w-50 rounded mb-5" src="<?= $onePost['imgSrc'] ?>"
                     alt="<?= $onePost['imgAlt'] ?>">
                <div class="alert alert-secondary text-center" role="alert">
                    <?= $onePost['slogan'] ?>
                </div>
                <div class="content text-justify" style="text-align: justify">
                    <?= $onePost['content'] ?>
                </div>
            </div>

            <!-- Comment List Start -->
            <div class="mb-5 comment-List-container">
                <h3 class="text-uppercase border-start border-5 border-primary ps-3 mb-4"><?= $onePost['countComments'] ?>
                    Комментариев</h3>
            </div>
            <!-- Comment List End -->

            <!-- Comment Form Start -->
            <div class="bg-light rounded p-5">
                <h3 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Оставить комментарий</h3>
                <form class="leave-comment-form">
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control bg-white border-0" name="login" placeholder="Ваше имя"
                                   style="height: 55px;">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="email" class="form-control bg-white border-0" name="email" placeholder="Ваш Email"
                                   style="height: 55px;">
                        </div>
                        <div class="col-12">
                            <textarea class="form-control bg-white border-0" name="comment" rows="5" placeholder="Сообщение"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3 save-comment-button" type="button">Оставить комментарий</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Comment Form End -->
        </div>
        <script src="/static/js/onePostComments.js"></script>
    </div>
</div>