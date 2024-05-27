<?php
class Users extends Main {
    // Функция для отображения списка пользователей
    public function index() {
        // Получаем соединение с базой данных
        $db = Database::getInstance()->getConnection();
        // Выполняем запрос к базе данных для выборки всех пользователей
        $result = $db->query("SELECT * FROM users");

        // Создаем пустой массив для хранения информации о пользователях
        $users = [];
        // Перебираем результат запроса и добавляем каждого пользователя в массив
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        // Вызываем функцию render для отображения представления users с данными о пользователях
        $this->render('users', ['users' => $users]);
    }

    // Функция для создания нового пользователя
    public function create() {
        // Проверяем метод запроса: если POST, обрабатываем данные, иначе отображаем форму создания пользователя
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получаем данные формы из POST-запроса
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Хешируем пароль

            // Получаем соединение с базой данных
            $db = Database::getInstance()->getConnection();
            // Подготавливаем запрос к базе данных для добавления нового пользователя
            $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            // Привязываем параметры к запросу
            $stmt->bind_param("sss", $name, $email, $password);
            // Выполняем запрос
            $stmt->execute();
            // Закрываем запрос
            $stmt->close();

            // Перенаправляем пользователя на страницу списка пользователей после успешного создания пользователя
            header("Location: index.php?controller=Users");
        } else {
            // Если метод запроса не POST, отображаем форму создания пользователя
            $this->render('user_create');
        }
    }
}
?>
