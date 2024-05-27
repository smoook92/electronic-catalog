<?php
class Otzivi extends Main {
    // Функция для отображения списка отзывов
    public function index() {
        // Получаем соединение с базой данных
        $db = Database::getInstance()->getConnection();
        // Выполняем запрос к базе данных для получения всех отзывов
        $result = $db->query("SELECT * FROM otzivi");

        // Создаем пустой массив для хранения отзывов
        $otzivi = [];
        // Перебираем результат запроса и добавляем отзывы в массив
        while ($row = $result->fetch_assoc()) {
            $otzivi[] = $row;
        }

        // Вызываем функцию render для отображения представления otzivi с данными об отзывах
        $this->render('otzivi', ['otzivi' => $otzivi]);
    }

    // Функция для добавления нового отзыва
    public function add() {
        // Проверяем, была ли отправлена форма методом POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получаем данные из формы
            $user_id = $_POST['user_id'];
            $product_id = $_POST['product_id'];
            $content = $_POST['content'];

            // Получаем соединение с базой данных
            $db = Database::getInstance()->getConnection();
            // Подготавливаем запрос к базе данных для добавления отзыва
            $stmt = $db->prepare("INSERT INTO otzivi (user_id, product_id, content) VALUES (?, ?, ?)");
            // Привязываем параметры к запросу
            $stmt->bind_param("iis", $user_id, $product_id, $content);
            // Выполняем запрос
            $stmt->execute();
            // Закрываем запрос
            $stmt->close();

            // Перенаправляем пользователя на страницу со списком отзывов
            header("Location: index.php?controller=Otzivi");
        } else {
            // Если форма не была отправлена, отображаем представление otzivi_add для добавления отзыва
            $this->render('otzivi_add');
        }
    }
}
?>
