<div class="container">
    <h1>Новая заявка на обратный звонок</h1>
    <form action="index.php?controller=Zakzvon&action=create" method="post">
        <label for="name">Имя</label>
        <input type="text" id="name" name="name" required>
        
        <label for="phone">Телефон</label>
        <input type="text" id="phone" name="phone" required>
        
        <label for="description">Описание</label>
        <textarea id="description" name="description" required></textarea>
        
        <button type="submit">Отправить</button>
    </form>
</div>