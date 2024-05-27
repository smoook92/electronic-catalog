<div class="container">
    <h1>Пользователи</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= $user['name'] ?> (<?= $user['email'] ?>)</li>
        <?php endforeach; ?>
    </ul>
</div>