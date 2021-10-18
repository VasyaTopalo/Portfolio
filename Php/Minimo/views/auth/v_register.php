
<h2 class="mt-3">Реєстрація</h2>

<form method="post" class="mt">
    <div class="form-group">
        <label for="register-login">Логін</label>
        <input type="text" class="form-control" id="register-login" name="login" required>
    </div>
    <div class="form-group">
        <label for="register-name">Ім'я</label>
        <input type="text" class="form-control" id="register-name" name="name" required>
    </div>
    <div class="form-group">
        <label for="register-password">Пароль</label>
        <input type="password" class="form-control" id="register-password" name="password" required>
    </div>
    <button class="btn btn-success mt-3" type="submit">Зареєструватись</button>
    <?if($registerErr):?>
        <hr>
        <div class="alert alert-danger">
            <?foreach ($validateErrors as $error):?>
                <p><?=$error?></p>
            <?endforeach;?>
        </div>
    <?endif;?>
</form>