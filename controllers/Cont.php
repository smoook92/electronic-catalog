<?php
class Cont extends Main {
    // Функция для отображения списка контента
    public function index() {
        $db = Database::getInstance()->getConnection();
        $result = $db->query("SELECT * FROM content");

        $contents = [];
        while ($row = $result->fetch_assoc()) {
            $contents[] = $row;
        }

        // Рендеринг списка контента
        $this->render('content_list', ['contents' => $contents]);
    }

    // Функция для просмотра отдельного контента
    public function view($id) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM content WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $content = $result->fetch_assoc();
        $stmt->close();

        // Рендеринг отдельной страницы контента
        $this->render('content', ['content' => $content]);
    }
}
?>
