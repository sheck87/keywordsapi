<?php if (KeywordAPI\Session::has('error')):?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <?=KeywordAPI\Session::pull('error');?>
            </div>
        </div>
    </div>
<?php endif;?>