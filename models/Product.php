<?php

require_once __DIR__ . '/../config/database.php';

class Product
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->connect();
    }

    public function all()
    {
        $sql = "SELECT * 
                FROM products 
                WHERE deleted = 0
                ORDER BY id DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function find(int $id)
    {
        $sql = "SELECT * 
                FROM products 
                WHERE id = :id 
                AND deleted = 0";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function create(array $data)
    {
        $sql = "INSERT INTO products (name, description, price, deleted) 
                VALUES (:name, :description, :price, 0)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':description', $data['description']);
        $stmt->bindValue(':price', $data['price']);

        return $stmt->execute();
    }

    public function update(int $id, array $data)
    {
        $sql = "UPDATE products 
                SET name = :name,
                    description = :description,
                    price = :price
                WHERE id = :id
                AND deleted = 0";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':description', $data['description']);
        $stmt->bindValue(':price', $data['price']);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function delete(int $id)
    {
        $sql = "UPDATE products 
                SET deleted = 1 
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}