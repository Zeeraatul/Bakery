<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Опции</h1>
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
                            <h3 class="card-title">Список всех доступныйх опций</h3>
                        </div>
                        <div class="card-body">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                                   aria-expanded="false" aria-controls="collapseExample">
                                    Создать опцию
                                </a>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-warning">
                                    <div class="card-header">
                                        <h3 class="card-title">Новая опция</h3>
                                    </div>
                                    <form method="post" action="/controlpanel/config/createOption">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Value</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Value" name="value">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Group</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Group" name="group">
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1">
                                    <input type="text" class="form-control text-center" placeholder="Id" readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control text-center" placeholder="Name" readonly>
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control text-center" placeholder="Value" readonly>
                                </div>
                                <div class="col-1">
                                    <input type="text" class="form-control text-center" placeholder="Group" readonly>
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control text-center" placeholder="Controls" readonly>
                                </div>
                            </div>
                        </div>
                        <?php
                        foreach ($data['options'] as $key => $option) {
                            ?>
                            <form method="post" action="/controlpanel/config/updateOption" class="option-forms">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-1">
                                            <input type="text" class="form-control text-center" placeholder="Id"
                                                   readonly name="id" value="<?= $option['Id'] ?>">
                                        </div>
                                        <div class="col-3">
                                            <input type="text" class="form-control" placeholder="Name" name="name"
                                                   value="<?= $option['name'] ?>">
                                        </div>
                                        <div class="col-5">
                                            <textarea type="text" class="form-control" placeholder="Value"
                                                      name="value"><?= $option['value'] ?></textarea>
                                        </div>
                                        <div class="col-1">
                                            <input type="text" class="form-control" placeholder="Group" name="group"
                                                   value="<?= $option['group'] ?>">
                                        </div>
                                        <div class="col-2 text-center">
                                            <button type="reset" class="btn btn-warning">Сброс</button>
                                            <button type="submit" class="btn btn-success">Обновить</button>
                                            <?php
                                                if($option['idSystem'] == false) { ?>
                                                    <button type="button" class="btn btn-danger delete-option-button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                <?php }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="/controlpanel/static/dist/js/removeOptions.js"></script>

