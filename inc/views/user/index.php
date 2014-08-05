<h2>Список пользователей</h2>

<table class="table table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Имя</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($this->users as $user) { ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td>
                <a href="<?= Controller::url('user', 'view', $user['id']) ?>" class="btn btn-default js-show"><i
                        class="glyphicon glyphicon-eye-open"></i>Профиль</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>