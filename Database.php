<?php
class Database {
    // Статическое поле для хранения единственного экземпляра класса Database
    private static $instance = null;
    // Поле для хранения соединения с базой данных
    private $conn;

    // Параметры подключения к базе данных
    private $host = 'localhost'; /* Адрес сервера */
    private $user = 'root'; /* Имя пользователя */
    private $pass = 'root'; /* Пароль пользователя */
    private $dbname = 'database'; /* Название базы данных */

    // Приватный конструктор для создания соединения с базой данных
    private function __construct() {
        // Устанавливаем соединение с базой данных
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        // Проверяем успешность соединения
        if ($this->conn->connect_error) {
            // Если соединение не удалось, выводим сообщение об ошибке
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Статический метод для получения единственного экземпляра класса Database
    public static function getInstance() {
        // Если экземпляр еще не создан, создаем его
        if (!self::$instance) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    // Метод для получения соединения с базой данных
    public function getConnection() {
        return $this->conn;
    }
}
?>
