<div class="container">
    <h1>Новая новость</h1>
    <form action="index.php?controller=Novosti&action=create" method="post">
        <label for="title">Заголовок</label>
        <input type="text" id="title" name="title">
        <label for="content">Содержание</label>
        <textarea id="content" name="content"></textarea>
        <button type="submit">Создать</button>
    </form>
</div>