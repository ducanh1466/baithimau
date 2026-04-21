<?php
class CommentModel extends BaseModel {

    public function getByProduct($product_id)
    {
        $sql = "SELECT * FROM tb_comment 
                WHERE product_id = ? 
                ORDER BY id DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO tb_comment(product_id, user_name, content, rating)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['product_id'],
            $data['user_name'],
            $data['content'],
            $data['rating']
        ]);
    }
    public function getLatest()
{
    $sql = "SELECT * FROM tb_comment ORDER BY id DESC LIMIT 5";
    return $this->pdo->query($sql)->fetchAll();
}
}