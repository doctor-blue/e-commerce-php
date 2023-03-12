<?php

class CategoryController{

    
    public function fetchAll($pdo){
        $statement = $pdo->prepare("SELECT * FROM categories ORDER BY title");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findCategoryByTitle($title,$pdo){
        $statement = $pdo->prepare("SELECT * FROM categories WHERE title=?");
        $statement->execute(array($title));
        return !$statement->rowCount() > 0;
    }

    public function createCategory($title,$pdo){
        $statement = $pdo->prepare("INSERT INTO categories(title) VALUES (?)");
        $statement->execute(array($title));    
    }
}

?>