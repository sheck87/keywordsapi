<?php $this->layout('admin::layout') ?>
<?php $this->insert('admin::navigation') ?>
<?php $this->insert('admin::sidebar', ['active' => 'index']) ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <h1 class="page-header">Главная</h1>
    </div>
    
    <div class="row">
        <div class="col-md-4 card">
            <div class="card-header">Категории:</div>
            <div class="card-body">
                <ul>
                    <?php foreach ($dataProvider->categories() as $category):?>
                        <li><a href="#"><?=$category?> (<?=$dataProvider->countKeywordsInCategory($category)?>)</a></li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>