<?php

class ProductModel extends BaseModel
{
        public function getAll()
    {
        $sql = "SELECT p.*, img.image_url 
                FROM tb_product p
                LEFT JOIN product_images img 
                ON p.id = img.product_id AND img.is_main = 1
                ORDER BY p.id DESC";

        return $this->pdo->query($sql)->fetchAll();
    }

    public function getByCategory($category_id)
    {
        $sql = "SELECT p.*, c.name AS category_name
                FROM tb_product p
                JOIN tb_category c ON p.category_id = c.id
                WHERE p.category_id = :category_id
                ORDER BY p.id DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['category_id' => $category_id]);
        return $stmt->fetchAll();
    }

    public function getByID($id)
    {
        $sql = "SELECT p.*, c.name AS category_name
                FROM tb_product p
                JOIN tb_category c ON p.category_id = c.id
                WHERE p.id = :id LIMIT 1";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO tb_product(name, price, quantity, image, description, category_id)
                VALUES (:name, :price, :quantity, :image, :description, :category_id)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'name' => $data['name'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'image' => $data['image'],
            'description' => $data['description'],
            'category_id' => $data['category_id']
        ]);
    }

    public function update($data, $id)
    {
        $sql = "UPDATE tb_product 
                SET name = :name,
                    price = :price,
                    quantity = :quantity,
                    image = :image,
                    description = :description,
                    category_id = :category_id
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'id' => $id,
            'name' => $data['name'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'image' => $data['image'],
            'description' => $data['description'],
            'category_id' => $data['category_id']
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tb_product WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
    public function search($keyword)
    {
        $sql = "SELECT * FROM tb_product 
                WHERE name LIKE :keyword 
                LIMIT 10";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'keyword' => '%' . $keyword . '%'
        ]);

        return $stmt->fetchAll();
    }
            public function getTopFavorite()
    {
        $sql = "SELECT p.*, AVG(c.rating) as avg_rating
                FROM tb_product p
                LEFT JOIN tb_comment c ON p.id = c.product_id
                GROUP BY p.id
                ORDER BY avg_rating DESC
                LIMIT 4";

        return $this->pdo->query($sql)->fetchAll();
    }

        public function getLatest()
    {
        $sql = "SELECT * FROM tb_product ORDER BY id DESC LIMIT 4";
        return $this->pdo->query($sql)->fetchAll();
    }
        public function getRating($product_id)
    {
        $sql = "SELECT AVG(rating) as avg_rating, COUNT(*) as total
                FROM tb_comment WHERE product_id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$product_id]);

        return $stmt->fetch();
    }
        public function getRelated($category_id, $id)
    {
        $sql = "SELECT * FROM tb_product 
                WHERE category_id = ? AND id != ? 
                LIMIT 4";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$category_id, $id]);

        return $stmt->fetchAll();
    }
        public function getImages($product_id)
    {
        $sql = "SELECT * FROM product_images WHERE product_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll();
    }
            public function deleteImage($id)
        {
            $sql = "DELETE FROM product_images WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$id]);
        }
        public function insertImage($product_id, $fileName)
{
    $sql = "INSERT INTO product_images(product_id, image_url, is_main)
            VALUES (?, ?, 0)";

    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([$product_id, $fileName]);
}
    
}