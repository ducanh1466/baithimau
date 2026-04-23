<?php

class UserModel extends BaseModel
{
    public function getAll()
    {
        $sql = "SELECT * FROM tb_user ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findByUsername($username)
    {
        $sql = "SELECT * FROM tb_user WHERE user_name = :username LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        return $stmt->fetch();
    }

    public function existsUsername($username)
    {
        $sql = "SELECT id FROM tb_user WHERE user_name = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    public function getByID($id)
    {
        $sql = "SELECT * FROM tb_user WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

            public function insert($data)
        {
            $sql = "INSERT INTO tb_user(
                user_name, pass_word, full_name, email, phone, address, id_role, status
            )
            VALUES (
                :user_name, :pass_word, :full_name, :email, :phone, :address, :id_role, :status
            )";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([
                'user_name' => $data['user_name'],
                'pass_word' => password_hash($data['pass_word'], PASSWORD_DEFAULT),
                'full_name' => $data['full_name'],
                'email'     => $data['email'],
                'phone'     => $data['phone'],
                'address'   => $data['address'],
                'id_role'   => $data['id_role'],
                'status'    => 1 // 🔥 mặc định active
            ]);
        }

    public function delete($id)
    {
        $sql = "DELETE FROM tb_user WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }


        public function update($data, $id)
    {
        $sql = "UPDATE tb_user SET 
            user_name = :user_name,
            full_name = :full_name,
            email = :email,
            phone = :phone,
            address = :address,
            id_role = :id_role";

        $params = [
            'id' => $id,
            'user_name' => $data['user_name'] ?? null,
            'full_name' => $data['full_name'] ?? null,
            'email' => $data['email'] ?? null,
            'phone' => $data['phone'] ?? null,
            'address' => $data['address'] ?? null,
            'id_role' => $data['id_role'] ?? 1
        ];

        // 🔥 PASSWORD (nếu có)
        if (!empty($data['pass_word'])) {
            $sql .= ", pass_word = :pass_word";
            $params['pass_word'] = password_hash($data['pass_word'], PASSWORD_DEFAULT);
        }

        // 🔥 STATUS (khóa / mở tài khoản)
        if (isset($data['status'])) {
            $sql .= ", status = :status";
            $params['status'] = $data['status'];
        }

        $sql .= " WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute($params);
    }
            public function updateStatus($id, $status)
        {
            $sql = "UPDATE tb_user SET status = :status WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([
                'id' => $id,
                'status' => $status
            ]);
        }
}