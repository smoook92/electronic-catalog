<?php
class Tovari extends Main {
    // Функция для отображения списка товаров
    public function index() {
        $categoryId = $_GET['category'] ?? null;
        $db = Database::getInstance()->getConnection();
        
        if ($categoryId) {
            $stmt = $db->prepare("SELECT * FROM products WHERE category_id = ?");
            $stmt->bind_param("i", $categoryId);
            $stmt->execute();
            $result = $stmt->get_result();
            $products = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
        } else {
            $result = $db->query("SELECT * FROM products");
            $products = $result->fetch_all(MYSQLI_ASSOC);
        }

        // Проверяем наличие товаров
        if (empty($products)) {
            echo "<p>Товаров в выбранной категории нет</p>";
            return;
        }

        $this->render('products', ['products' => $products]);
    }

    // Функция для отображения информации о товаре по его идентификатору
    public function view($id) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        $stmt->close();
    
        $this->render('product', ['product' => $product]);
    }

    // Функция для создания нового товара
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("INSERT INTO products (name, description, price, category_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssdi", $name, $description, $price, $category_id);
            $stmt->execute();
            $stmt->close();

            header("Location: index.php?controller=Tovari");
            exit();
        } else {
            $db = Database::getInstance()->getConnection();
            $result = $db->query("SELECT * FROM categories");
            $categories = $result->fetch_all(MYSQLI_ASSOC);
            $this->render('product_create', ['categories' => $categories]);
        }
    }

    public function addToCart($id) {
    // Начать сеанс, если он еще не начат
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = 1;
    } else {
        $_SESSION['cart'][$id]++;
    }


    // Перенаправляем пользователя на страницу корзины
    header("Location: index.php?controller=Korzina");
    exit(); // Важно завершить выполнение скрипта после отправки заголовка
}
}
?>