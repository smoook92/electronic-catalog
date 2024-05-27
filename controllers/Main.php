<?php
class Main {
    // Функция для отображения главной страницы
    public function index() {
        // Вызываем функцию render для отображения представления main
        $this->render('main');
    }

    // Защищенная функция для отображения представлений
    protected function render($view, $data = []) {
        // Извлекаем данные из массива $data в переменные
        extract($data);
        // Включаем файл header.php
        include 'views/header.php';
        // Включаем файл с представлением, переданным в качестве аргумента
        include 'views/' . $view . '.php';
        // Включаем файл footer.php
        include 'views/footer.php';
    }
}
?>
