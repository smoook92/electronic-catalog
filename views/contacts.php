<div class="container">
    <h1>Контакты</h1>
    <form action="index.php?controller=Contacts" method="post">
        <label for="name">Имя</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        
        <label for="phone">Телефон</label>
        <input type="text" id="phone" name="phone">
        
        <label for="message">Сообщение</label>
        <textarea id="message" name="message" required></textarea>
        
        <button type="submit">Отправить</button>
    </form>
</div>