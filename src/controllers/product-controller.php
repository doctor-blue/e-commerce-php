<?php

class ProductController
{

    public function createProduct(Product $product)
    {
        require __DIR__ . '/db.php';
        $categoryStatement = $pdo->prepare("SELECT count(*) FROM categories WHERE title=?");
        $categoryStatement->execute(array($product->getCategory()));
        if (!$categoryStatement->fetchColumn() > 0) {
            $statement = $pdo->prepare("INSERT INTO categories(title) VALUES (?)");
            $statement->execute(array($product->getCategory()));
        }
        $statement = $pdo->prepare("INSERT INTO products(title, price, description, category, images) VALUES (?, ?, ?, ?, ?)");
        $statement->execute(array(
            $product->getTitle(),
            $product->getPrice(),
            $product->getDescription(),
            $product->getCategory(),
            $product->getImages()
        ));
    }

    public function fetchAllProducts()
    {
        require __DIR__ . '/db.php';
        $statement = $pdo->prepare("SELECT * FROM products");
        $statement->execute();
        if ($statement->rowCount() > 0) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function deleteProduct($id)
    {
        require __DIR__ . '/db.php';
        $statement = $pdo->prepare("DELETE FROM products WHERE id=?");
        $statement->execute(array($id));
    }

    public function getProductById($id)
    {
        require __DIR__ . '/db.php';
        $statement = $pdo->prepare("SELECT * FROM products WHERE id=?");
        $statement->execute(array($id));
        if ($statement->rowCount() > 0) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function updateProductTitle($title, $productId) {
        require __DIR__ . '/db.php';
        $statement = $pdo->prepare("UPDATE products SET title=? WHERE id=?");
        $statement->execute(array($title, $productId));
    }

    public function updateProductPrice($price, $productId) {
        require __DIR__ . '/db.php';
        $statement = $pdo->prepare("UPDATE products SET price=? WHERE id=?");
        $statement->execute(array($price, $productId));
    }

    public function updateProductDescription($description, $productId) {
        require __DIR__ . '/db.php';
        $statement = $pdo->prepare("UPDATE products SET description=? WHERE id=?");
        $statement->execute(array($description, $productId));
    }

    public function updateProductCategory($category, $productId) {
        require __DIR__ . '/db.php';
        $statement = $pdo->prepare("UPDATE products SET category=? WHERE id=?");
        $statement->execute(array($category, $productId));
    }
    
    public function updateProductImage($path, $productId) {
        require __DIR__ . '/db.php';
        $statement = $pdo->prepare("UPDATE products SET images=? WHERE id=?");
        $statement->execute(array($path, $productId));
    }
}
