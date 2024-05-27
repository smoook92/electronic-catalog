<?php
session_start();

// Автоматическая загрузка контроллеров
function autoload($class) {
    include 'controllers/' . $class . '.php';
}
spl_autoload_register('autoload');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'Database.php';

// Получение контроллера и действия из URL
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'Main';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Убедимся, что контроллер существует
if (class_exists($controllerName)) {
    $controller = new $controllerName();
    // Убедимся, что действие существует в контроллере
    if (method_exists($controller, $action)) {
        // Проверяем, нужно ли передать идентификатор товара
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // Вызываем метод действия с передачей идентификатора товара
            $controller->$action($id);
        } else {
            // Если идентификатор товара не требуется, вызываем метод действия без параметров
            $controller->$action();
        }
    } else {
        echo "Действие $action не найдено в контроллере $controllerName.";
    }
} else {
    echo "Контроллер $controllerName не найден.";
}
?>