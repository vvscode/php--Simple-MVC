<form method="post">
    <label for="login">Login</label>
    <input id="login" name="login" value="<?= $this->login ?>" />
    <br />
    <label for="password">Login</label>
    <input id="password" name="password" type="password" />
    <br />
    <input type="submit" value="Войти">
    <br />
    <p><?= $this->msg ?></p>
</form>