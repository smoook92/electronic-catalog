<div class="container">
    <h1>Новый заказ</h1>
    <form action="index.php?controller=Zakazi&action=create" method="post">
        <label for="user_id">ID пользователя</label>
        <input type="number" id="user_id" name="user_id" required>
        
        <label for="description">Описание</label>
        <textarea id="description" name="description" required></textarea>
        
        <button type="submit">Создать</button>
    </form>
</div>