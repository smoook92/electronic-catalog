<?php
class Zakazi extends Main {
    // Функция для отображения списка заказов
    public function index() {
        // Получаем соединение с базой данных
        $db = Database::getInstance()->getConnection();
        // Выполняем запрос к базе данных для выборки всех заказов
        $result = $db->query("SELECT * FROM zakazi");

        // Создаем пустой массив для хранения информации о заказах
        $zakazi = [];
        // Перебираем результат запроса и добавляем каждый заказ в массив
        while ($row = $result->fetch_assoc()) {
            $zakazi[] = $row;
        }

        // Вызываем функцию render для отображения представления zakazi с данными о заказах
        $this->render('zakazi', ['zakazi' => $zakazi]);
    }

    // Функция для создания нового заказа
    public function create() {
        // Проверяем метод запроса: если POST, обрабатываем данные, иначе отображаем форму создания заказа
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получаем данные формы из POST-запроса
            $user_id = $_POST['user_id'];
            $description = $_POST['description'];

            // Получаем соединение с базой данных
            $db = Database::getInstance()->getConnection();
            // Подготавливаем запрос к базе данных для добавления нового заказа
            $stmt = $db->prepare("INSERT INTO zakazi (user_id, description) VALUES (?, ?)");
            // Привязываем параметры к запросу
            $stmt->bind_param("is", $user_id, $description);
            // Выполняем запрос
            $stmt->execute();
            // Закрываем запрос
            $stmt->close();

            // Перенаправляем пользователя на страницу списка заказов после успешного создания заказа
            header("Location: index.php?controller=Zakazi");
        } else {
            // Если метод запроса не POST, отображаем форму создания заказа
            $this->render('zakazi_create');
        }
    }
}
?>
