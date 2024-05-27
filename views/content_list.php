<div class="container">
    <h1>Текстовые страницы</h1>
    <ul>
        <?php foreach ($contents as $content): ?>
            <li><a href="index.php?controller=Cont&action=view&id=<?= $content['id'] ?>"><?= $content['title'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>