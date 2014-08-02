<div class="container">
    <h2>Список пользователей</h2>

    <ol>
        <?php foreach ($this->users as $user) { ?>
            <li value="<?= $user['id'] ?>"><a href="<?= Controller::url('user','view', $user['id'])?>"><?= $user['name'] ?></a></li>
        <?php } ?>
    </ol>