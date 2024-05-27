<?php
class Contacts extends Main {
    // Функция для отображения страницы контактов и обработки формы
    public function index() {
        // Проверяем, был ли запрос методом POST (отправлена форма)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];

            // Сохраняем данные в базе данных
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $phone, $message);
            $stmt->execute();
            $stmt->close();

            // После успешного сохранения данных рендерим страницу с сообщением об успешной отправке
            $this->render('contacts_success');
        } else {
            // Если запрос не методом POST, просто отображаем страницу контактов
            $this->render('contacts');
        }
    }
}
?>
