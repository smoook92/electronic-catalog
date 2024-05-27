<div class="container">
    <h1>Заявки на обратный звонок</h1>
    <ul>
        <?php foreach ($zakzvon as $zvon): ?>
            <li>Заявка #<?= $zvon['id'] ?>: <?= $zvon['name'] ?> - <?= $zvon['phone'] ?> (<?= $zvon['description'] ?>)</li>
        <?php endforeach; ?>
    </ul>
</div>