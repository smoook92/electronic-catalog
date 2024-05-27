<div class="container">
    <h1>Заказы</h1>
    <ul>
        <?php foreach ($zakazi as $zakaz): ?>
            <li>Заказ #<?= $zakaz['id'] ?>: <?= $zakaz['description'] ?> (Пользователь ID: <?= $zakaz['user_id'] ?>)</li>
        <?php endforeach; ?>
    </ul>
</div>
