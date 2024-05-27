<div class="container">
    <h1><?= $product['name'] ?></h1>
    <p><?= $product['description'] ?></p>
    <p>Цена: <?= $product['price'] ?> руб.</p>
    <form action="index.php?controller=Tovari&action=addToCart&id=<?= $product['id'] ?>" method="POST">
        <button type="submit">Добавить в корзину</button>
    </form>
</div>
