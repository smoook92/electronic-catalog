<div class="container">
    <h1>Новый отзыв</h1>
    <form action="index.php?controller=Otzivi&action=add" method="post">
        <label for="user_id">ID пользователя</label>
        <input type="number" id="user_id" name="user_id" required>
        
        <label for="product_id">ID продукта</label>
        <input type="number">
        <label for="product_id">ID продукта</label>
        <input type="number" id="product_id" name="product_id" required>
        
        <label for="content">Отзыв</label>
        <textarea id="content" name="content" required></textarea>
        
        <button type="submit">Добавить</button>
    </form>
</div>