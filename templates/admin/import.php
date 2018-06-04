<?php $this->layout('admin::layout') ?>
<?php $this->insert('admin::navigation') ?>
<?php $this->insert('admin::sidebar', ['active' => 'import']) ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <?php $this->insert('admin::errors') ?>
    <div class="row">
        <h1 class="page-header">Импорт</h1>
    </div>
    
    <div class="row">
        <div class="col-md-6 card">
            <div class="card-header">Способ импорта</div>
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#default" aria-controls="default" role="tab" data-toggle="tab">Из Файла</a></li>
                    <li role="presentation"><a href="#text" aria-controls="text" role="tab" data-toggle="tab">Текстом</a></li>
                    <li role="presentation"><a href="#bukvarix" aria-controls="bukvarix" role="tab" data-toggle="tab">Букварикс</a></li>
                </ul>
                <div class="tab-content import-tabs">
                    <div role="tabpanel" class="tab-pane active" id="default">
                        <form action="admin.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="import"/>
                            <input type="hidden" name="type" value="file"/>
                
                            <div class="form-group">
                                <input type="file" name="file" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Категория:</label>
                                <select name="category" class="form-control" required>
                                    <?php foreach ($categories as $category):?>
                                        <option value="<?= $category ?>"><?= $category ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info">Загрузить</button>
                            </div>
            
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="text">
                        <div class="form-group">
                            <textarea name="text" rows="15" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info">Load</button>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="bukvarix">
                        <div class="form-inline">
                            <div class="form-group">
                                <input type="text" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info">Load</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
