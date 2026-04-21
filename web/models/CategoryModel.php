<?php

class CategoryModel extends BaseModel
{
    public function getAll()
    {
        $sql = "SELECT * FROM tb_category ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByID($id)
    {
        $sql = "SELECT * FROM tb_category WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO tb_category(name) VALUES (:name)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'name' => $data['name']
        ]);
    }

    public function update($data, $id)
    {
        $sql = "UPDATE tb_category SET name = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['name'],
            $id
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tb_category WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}