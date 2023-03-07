<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Категории</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/controlpanel/admin/index">Админ Панель</a></li>
                        <li class="breadcrumb-item active">Опции сайта</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Список всех доступныйх категорий</h3>
                        </div>
                        <div class="card-body">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                                   aria-expanded="false" aria-controls="collapseExample">
                                    Создать категорию
                                </a>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-warning">
                                    <div class="card-header">
                                        <h3 class="card-title">Новая Категория</h3>
                                    </div>
                                    <form method="post" action="/controlpanel/Categories/createCategory" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Название категории:</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name" name="category">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Описание: </label>
                                                <textarea type="password" class="form-control" id="exampleInputPassword1" name="description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Изображение категории</label>
                                                <input type="file" class="form-control" name="imgSrc">
                                            </div>
                                            <div class="form-group">
                                                <label>Альтернативный текст</label>
                                                <input type="text" class="form-control" placeholder="Альтернативный текст" name="imgAlt">
                                            </div>
                                            <div class="form-group">
                                                <label>Slug</label>
                                                <input type="text" class="form-control" placeholder="slug" name="slug">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-danger" type="reset" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                Отмена
                                            </button>
                                            <button type="submit" class="btn btn-success">Создать</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body row">

                            <?php
                                foreach ($data['categories'] as $key => $value){
                            ?>
                            <div class="card card-warning col-md-4 category-card">
                                <div class="card-header">
                                    <h3 class="card-title">Управление категорией</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form method="post" action="" class="category-forms">
                                        <!-- input states -->
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputSuccess"><i
                                                        class="fas fa-check"></i> Название категории: </label>
                                            <input type="text" class="form-control" value="<?= $value['category'] ?>"/>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Text</label>
                                                    <img  src="<?= $value['imgSrc']?>" style="max-width: 200px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Textarea</label>
                                                    <textarea class="form-control" rows="3"
                                                              placeholder="Enter ..."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Id</label>
                                                    <input type="text" class="form-control form-with-id" readonly value="<?= $value['Id'] ?>"/>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- input states -->
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputSuccess"><i
                                                        class="fas fa-check"></i> Описание категории: </label>
                                            <textarea type="text" class="form-control is-valid" id="inputSuccess" rows="5"><?= $value['description'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i>Slug</label>
                                            <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Slug" value="<?= $value['slug']?>">
                                        </div>
                                        <div class="form-group">
                                        <div class="col-2 text-center">
                                            <button type="reset" class="btn btn-danger delete-category-button">Удалить</button>
                                            <button type="submit" class="btn btn-success">Обновить</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <? } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="/controlpanel/static/dist/js/removeCategories.js"></script>