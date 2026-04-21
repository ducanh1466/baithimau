<?php

class CartController
{
    public function index()
    {
        $title = "Giỏ hàng";

        $cart = $_SESSION['cart'] ?? [];

        $view = "cart/index";
        $data = compact('cart');

        require_once PATH_VIEW_MAIN_CLIENT;
    }

    public function add()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header("Location: ?mode=client&action=product-list");
            exit;
        }

        $productModel = new ProductModel();
       $product = $productModel->getByID($id);

        if (!$product) {
            header("Location: ?mode=client&action=product-list");
            exit;
        }

        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'quantity' => 1
            ];
        } else {
            $_SESSION['cart'][$id]['quantity']++;
        }

        header("Location: ?mode=client&action=cart");
        exit;
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            foreach ($_POST['quantity'] as $id => $qty) {
                if ($qty <= 0) {
                    unset($_SESSION['cart'][$id]);
                } else {
                    $_SESSION['cart'][$id]['quantity'] = $qty;
                }
            }
        }

        header("Location: ?mode=client&action=cart");
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;

        if ($id && isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }

        header("Location: ?mode=client&action=cart");
        exit;
    }
}