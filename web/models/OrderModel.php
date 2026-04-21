<?php

class OrderModel extends BaseModel
{
    public function getAll()
    {
        $sql = "SELECT o.*, u.user_name
                FROM tb_order o
                JOIN tb_user u ON o.user_id = u.id
                ORDER BY o.id DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByID($id)
    {
        $sql = "SELECT * FROM tb_order WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function getDetail($order_id)
    {
        $sql = "SELECT od.*, p.name AS product_name, p.image
                FROM tb_order_detail od
                JOIN tb_product p ON od.product_id = p.id
                WHERE od.order_id = :order_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['order_id' => $order_id]);
        return $stmt->fetchAll();
    }

    public function createOrder($data)
    {
        $sql = "INSERT INTO tb_order(user_id, full_name, phone, address, total_price, status)
                VALUES (:user_id, :full_name, :phone, :address, :total_price, 0)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'user_id' => $data['user_id'],
            'full_name' => $data['full_name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'total_price' => $data['total_price']
        ]);

        return $this->pdo->lastInsertId();
    }

    public function insertOrderDetail($data)
    {
        $sql = "INSERT INTO tb_order_detail(order_id, product_id, quantity, price)
                VALUES (:order_id, :product_id, :quantity, :price)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'order_id' => $data['order_id'],
            'product_id' => $data['product_id'],
            'quantity' => $data['quantity'],
            'price' => $data['price']
        ]);
    }

    public function updateStatus($id, $status)
    {
        $sql = "UPDATE tb_order SET status = :status WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'id' => $id,
            'status' => $status
        ]);
    }
}