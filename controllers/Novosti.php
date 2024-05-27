<?php
class Novosti extends Main {
    // Функция для отображения списка новостей
    public function index() {
        // Получаем соединение с базой данных
        $db = Database::getInstance()->getConnection();
        // Выполняем запрос к базе данных для получения всех новостей
        $result = $db->query("SELECT * FROM novosti");

        // Создаем пустой массив для хранения новостей
        $novosti = [];
        // Перебираем результат запроса и добавляем новости в массив
        while ($row = $result->fetch_assoc()) {
            $novosti[] = $row;
        }

        // Вызываем функцию render для отображения представления novosti_list с данными о новостях
        $this->render('novosti_list', ['novosti' => $novosti]);
    }

    // Функция для отображения конкретной новости по ее идентификатору
    public function view($id) {
        // Получаем соединение с базой данных
        $db = Database::getInstance()->getConnection();
        // Подготавливаем запрос к базе данных для получения конкретной новости по ее идентификатору
        $stmt = $db->prepare("SELECT * FROM novosti WHERE id = ?");
        // Привязываем параметры к запросу
        $stmt->bind_param("i", $id);
        // Выполняем запрос
        $stmt->execute();
        // Получаем результат запроса
        $result = $stmt->get_result();
        // Получаем данные о новости
        $novosti = $result->fetch_assoc();
        // Закрываем запрос
        $stmt->close();

        // Вызываем функцию render для отображения представления novosti с данными о новости
        $this->render('novosti', ['novosti' => $novosti]);
    }

    // Функция для создания новости
    public function create() {
        // Проверяем, была ли отправлена форма
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получаем данные из формы
            $title = $_POST['title'];
            $content = $_POST['content'];
            // Получаем соединение с базой данных
            $db = Database::getInstance()->getConnection();
            // Подготавливаем запрос к базе данных для вставки новости
            $stmt = $db->prepare("INSERT INTO novosti (title, content) VALUES (?, ?)");
            // Привязываем параметры к запросу
            $stmt->bind_param("ss", $title, $content);
            // Выполняем запрос
            $stmt->execute();
            // Закрываем запрос
            $stmt->close();

            // Перенаправляем пользователя на страницу со списком новостей после создания новости
            header("Location: index.php?controller=Novosti");
            exit(); // Убедитесь, что выполнение скрипта прекращается после перенаправления
        } else {
            // Если форма не была отправлена, отображаем форму создания новости
            $this->render('novosti_create');
        }
    }
}
?>
