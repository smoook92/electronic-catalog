<?php

class Korzina extends Main {
    public function index() {
    $cart = $_SESSION['cart'] ?? [];

    $db = Database::getInstance()->getConnection();

    $products = [];
    foreach ($cart as $productId => $quantity) {
        $stmt = $db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        $product['quantity'] = $quantity;
        $products[] = $product;
        $stmt->close();
    }

    $this->render('cart', ['products' => $products]);
}
    public function remove($id) {
        // Удаление товара из корзины по идентификатору $id
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }

        // Перенаправляем пользователя на страницу корзины
        header("Location: index.php?controller=Korzina&action=index");
        exit();
    }

}
?>