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

    public function getByID($id)
    {
        $sql = "SELECT * FROM tb_user WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function insert($data)
{
    $sql = "INSERT INTO tb_user(user_name, pass_word, full_name, email, phone, address, id_role)
            VALUES (:user_name, :pass_word, :full_name, :email, :phone, :address, :id_role)";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        'user_name' => $data['user_name'],
        'pass_word' => $data['pass_word'],
        'full_name' => $data['full_name'],
        'email'     => $data['email'],
        'phone'     => $data['phone'],
        'address'   => $data['address'],
        'id_role'   => $data['id_role']
    ]);
}

    public function delete($id)
    {
        $sql = "DELETE FROM tb_user WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}