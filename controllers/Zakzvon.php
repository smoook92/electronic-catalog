<?php
class Zakzvon extends Main {
    // Функция для отображения списка заявок на звонок
    public function index() {
        // Получаем соединение с базой данных
        $db = Database::getInstance()->getConnection();
        // Выполняем запрос к базе данных для выборки всех заявок на звонок
        $result = $db->query("SELECT * FROM zakzvon");

        // Создаем пустой массив для хранения информации о заявках на звонок
        $zakzvon = [];
        // Перебираем результат запроса и добавляем каждую заявку на звонок в массив
        while ($row = $result->fetch_assoc()) {
            $zakzvon[] = $row;
        }

        // Вызываем функцию render для отображения представления zakzvon с данными о заявках на звонок
        $this->render('zakzvon', ['zakzvon' => $zakzvon]);
    }

    // Функция для создания новой заявки на звонок
    public function create() {
        // Проверяем метод запроса: если POST, обрабатываем данные, иначе отображаем форму создания заявки на звонок
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получаем данные формы из POST-запроса
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $description = $_POST['description'];

            // Получаем соединение с базой данных
            $db = Database::getInstance()->getConnection();
            // Подготавливаем запрос к базе данных для добавления новой заявки на звонок
            $stmt = $db->prepare("INSERT INTO zakzvon (name, phone, description) VALUES (?, ?, ?)");
            // Привязываем параметры к запросу
            $stmt->bind_param("sss", $name, $phone, $description);
            // Выполняем запрос
            $stmt->execute();
            // Закрываем запрос
            $stmt->close();

            // Перенаправляем пользователя на страницу списка заявок на звонок после успешного создания заявки
            header("Location: index.php?controller=Zakzvon");
        } else {
            // Если метод запроса не POST, отображаем форму создания заявки на звонок
            $this->render('zakzvon_create');
        }
    }
}
?>
