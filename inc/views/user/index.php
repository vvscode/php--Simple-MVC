<div class="container">
    <h2>Список пользователей</h2>

    <ol>
        <?php foreach ($this->users as $user) { ?>
            <li value="<?= $user['id'] ?>"><?= $user['name'] ?></li>
        <?php } ?>
    </ol>