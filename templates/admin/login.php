<?php $this->layout('admin::layout', ['title' => 'Login']) ?>

<form class="form-signin" action="admin.php" method="POST">
    <input type="hidden" name="action" value="login"/>
    <h1 class="form-signin-heading text-center">Вход</h1>
    <?php if (!empty($errors)):?>
        <ul class="errors">
        <?php foreach ($errors as $err):?>
            <li><?=$this->e($err)?></li>
        <?php endforeach;?>
        </ul>
    <?php endif;?>
    <input type="text" name="login" class="form-control" placeholder="Логин" required autofocus>
    <input type="password" name="password" class="form-control" placeholder="Пароль" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
</form>