<?php

class AdminOrderController
{
    private function checkLogin()
    {
        if (!isset($_SESSION['admin'])) {
            header("Location: ?mode=admin&action=login");
            exit;
        }
    }

    public function index()
    {
        $this->checkLogin();

        $title = "Quản lý đơn hàng";
        $orders = (new OrderModel())->getAll();

        $view = "order/index";
        $data = compact('orders');

        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function detail()
    {
        $this->checkLogin();

        $id = $_GET['id'] ?? null;

        if (!$id) {
            header("Location: ?mode=admin&action=order-list");
            exit;
        }

        $orderModel = new OrderModel();

        $order = $orderModel->getByID($id);
        $details = $orderModel->getDetail($id);

        $title = "Chi tiết đơn hàng";
        $view = "order/detail";
        $data = compact('order', 'details');

        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function updateStatus()
    {
        $this->checkLogin();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? null;
            $status = $_POST['status'] ?? 0;

            if ($id) {
                (new OrderModel())->updateStatus($id, $status);
            }
        }

        header("Location: ?mode=admin&action=order-list");
        exit;
    }
}