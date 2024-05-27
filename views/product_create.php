<div class="container">
    <h1>Добавить новый товар</h1>
    <form action="index.php?controller=Tovari&action=create" method="POST">
        <label for="name">Название:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="description">Описание:</label>
        <textarea id="description" name="description" required></textarea><br>
        <label for="price">Цена:</label>
        <input type="number" step="0.01" id="price" name="price" required><br>
        <label for="category_id">Категория:</label>
        <select id="category_id" name="category_id" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select><br><br>
        <button type="submit">Добавить</button>
    </form>
</div>