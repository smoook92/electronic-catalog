<div class="container">
    <h1>Корзина</h1>
    <ul>
        <?php foreach ($products as $item): ?>
            <li>Товар #<?= $item['id'] ?>: <?= $item['quantity'] ?> шт.</li>
        <?php endforeach; ?>
    </ul>
</div>
