<div class="container">
    <h1>Категории</h1>
    <ul>
        <?php foreach ($categories as $category): ?>
            <li><a href="index.php?controller=Tovari&category=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
