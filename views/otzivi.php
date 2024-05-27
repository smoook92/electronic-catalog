<div class="container">
    <h1>Отзывы</h1>
    <ul>
        <?php foreach ($otzivi as $otziv): ?>
            <li>Отзыв #<?= $otziv['id'] ?>: <?= $otziv['content'] ?> (Пользователь ID: <?= $otziv['user_id'] ?>, Продукт ID: <?= $otziv['product_id'] ?>)</li>
        <?php endforeach; ?>
    </ul>
</div>
