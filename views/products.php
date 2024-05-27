<div class="container">
    <h1>Товары</h1>
    <ul>
        <?php if (is_array($products)): ?>
            <?php foreach ($products as $product): ?>
                <?php if (isset($product['name'])): ?>
                    <li><a href="index.php?controller=Tovari&action=view&id=<?= $product['id'] ?>"><?= $product['name'] ?></a> - <p>Цена: <?= $product['price'] ?> руб.</p></li>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>
