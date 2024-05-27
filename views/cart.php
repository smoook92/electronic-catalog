<div class="container">
    <h1>Корзина</h1>
<?php if (empty($products)): ?>
    <p>Ваша корзина пуста</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $item): ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['description'] ?></td>
                    <td><?= $item['price'] ?> руб.</td>
                    <td><?= $item['quantity'] ?></td>
                    <td>
                        <form action="index.php?controller=Korzina&action=remove&id=<?= $item['id'] ?>" method="POST">
                            <button type="submit">Удалить</button>
                        </form>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
</div>