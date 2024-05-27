<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Электронный каталог продукции и услуг">
    <title>Каталог продукции</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <div class="logo">
        <img src="assets/logo.png" alt="Логотип">
    </div>
    <nav>
        <ul>
            <li><a href="/">Главная</a></li>
            <li class="dropdown">
                <a href="index.php?controller=Tovari">Каталог</a>
                <ul class="submenu">
                    <li><a href="index.php?controller=Tovari&action=create">Добавить товар</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="index.php?controller=Kateg">Категории</a>
                <ul class="submenu">
                    <li><a href="index.php?controller=Kateg&action=create">Добавить категорию</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="index.php?controller=Novosti">Новости</a>
                <ul class="submenu">
                    <li><a href="index.php?controller=Novosti&action=create">Добавить новость</a></li>
                </ul>
            </li>
            <li><a href="index.php?controller=Contacts">Контакты</a></li>
            <li><a href="index.php?controller=Users">Пользователи</a></li>
            <li><a href="index.php?controller=Zakazi">Заказы</a></li>
            <li><a href="index.php?controller=Zakzvon">Заявки</a></li>
            <li><a href="index.php?controller=Korzina">Корзина</a></li>
            <li><a href="index.php?controller=Otzivi">Отзывы</a></li>
        </ul>
    </nav>
</header>

    <main>
