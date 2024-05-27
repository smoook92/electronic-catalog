<div class="container">
    <h1>Новости</h1>
    <ul>
        <?php foreach ($novosti as $novost): ?>
            <li><a href="index.php?controller=Novosti&action=view&id=<?= $novost['id'] ?>"><?= $novost['title'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>