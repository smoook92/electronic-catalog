<div class="container">
    <h1>Категории</h1>
    <ul>
        <?php foreach ($categories as $category): ?>
            <li><?= $category['name'] ?></li>
        <?php endforeach; ?>
    </ul>
</div>