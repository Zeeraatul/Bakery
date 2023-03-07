<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Блог</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/controlpanel/admin/index">Админ Панель</a></li>
                        <li class="breadcrumb-item active">Создание поста</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Создание нового поста</h3>
                        </div>
                    </div>
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label>Название поста</label>
                        <input type="text" class="form-control" placeholder="Название поста">
                    </div>
                    <div class="form-group">
                        <label>Слоган</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-sm-6">
                            <label for="exampleInputFile">Осное изображение поста</label>
                            <div class="input-group">
                                <input type="file" class="custom-file" name="imgSrc">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Альтернативный текст</label>
                                <input type="text" class="form-control" placeholder="Альтернативный текст" name="imgAlt">
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="exampleInputFile">Категория</label>
                                <div class="input-group">
                                    <select class="form-control" name="categoryId">
                                        <option >Список категорий</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Slug (человекопонятный URL)</label>
                                    <input type="text" class="form-control" placeholder="Альтернативный текст" name="slug">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Назначенные теги</label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Осное содержимое поста</label>
                        <textarea id="summernote" class="form-control" name="content"></textarea>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">Создать пост</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<script>
    window.addEventListener('load', () => {
        $(function () {
            $('#summernote').summernote()
        })
    })
</script>
