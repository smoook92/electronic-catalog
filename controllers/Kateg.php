<?php
class Kateg extends Main {
    // Функция для отображения списка категорий
    public function index() {
        // Получаем соединение с базой данных
        $db = Database::getInstance()->getConnection();
        // Выполняем запрос к таблице категорий
        $result = $db->query("SELECT * FROM categories");

        // Создаем массив для хранения категорий
        $categories = [];
        // Проходим по результатам запроса и добавляем категории в массив
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }

        // Рендерим страницу с категориями, передавая массив категорий для отображения
        $this->render('categories', ['categories' => $categories]);
    }

    // Функция для создания новой категории
    public function create() {
        // Проверяем, была ли отправлена форма
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получаем данные из формы
            $name = $_POST['name'];

            // Получаем соединение с базой данных
            $db = Database::getInstance()->getConnection();
            // Подготавливаем запрос к базе данных для вставки категории
            $stmt = $db->prepare("INSERT INTO categories (name) VALUES (?)");
            // Привязываем параметры к запросу
            $stmt->bind_param("s", $name);
            // Выполняем запрос
            $stmt->execute();
            // Закрываем запрос
            $stmt->close();

            // Перенаправляем пользователя на страницу со списком категорий после создания категории
            header("Location: index.php?controller=Kateg");
            exit(); // Убедитесь, что выполнение скрипта прекращается после перенаправления
        } else {
            // Если форма не была отправлена, отображаем форму создания категории
            $this->render('category_create');
        }
    }
}
?>
