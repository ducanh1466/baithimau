<?php

class OrderController
{
    public function checkout()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: ?mode=client&action=login");
            exit;
        }

        $cart = $_SESSION['cart'] ?? [];

        if (empty($cart)) {
            header("Location: ?mode=client&action=cart");
            exit;
        }

        $title = "Thanh toán";
        $view = "order/checkout";
        $data = compact('cart');

        require_once PATH_VIEW_MAIN_CLIENT;
    }

    public function store()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: ?mode=client&action=login");
            exit;
        }

        $cart = $_SESSION['cart'] ?? [];

        if (empty($cart)) {
            header("Location: ?mode=client&action=cart");
            exit;
        }

        $full_name = trim($_POST['full_name'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $address = trim($_POST['address'] ?? '');

        if ($full_name == '' || $phone == '' || $address == '') {
            $error = "Vui lòng nhập đầy đủ thông tin!";
            $title = "Thanh toán";
            $view = "order/checkout";
            $data = compact('error', 'cart');

            require_once PATH_VIEW_MAIN_CLIENT;
            return;
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $orderModel = new OrderModel();

        $order_id = $orderModel->createOrder([
            'user_id' => $_SESSION['user']['id'],
            'full_name' => $full_name,
            'phone' => $phone,
            'address' => $address,
            'total_price' => $total
        ]);

        foreach ($cart as $item) {
            $orderModel->insertOrderDetail([
                'order_id' => $order_id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        unset($_SESSION['cart']);

        header("Location: ?mode=client&action=/");
        exit;
    }
}