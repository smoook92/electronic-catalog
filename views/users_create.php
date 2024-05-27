<div class="container">
    <h1>Новый пользователь</h1>
    <form action="index.php?controller=Users&action=create" method="post">
        <label for="name">Имя</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Пароль</label>
        <input type="password" id="password" name="">
        <label for="password">Пароль</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Создать</button>
    </form>
</div>