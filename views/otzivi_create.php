<div class="container">
    <h1>Новый отзыв</h1>
    <form action="index.php?controller=Otzivi&action=create" method="post">
        <label for="author">Автор</label>
        <input type="text" id="author" name="author">
        <label for="content">Отзыв</label>
        <textarea id="content" name="content"></textarea>
        <button type="submit">Оставить отзыв</button>
    </form>
</div>