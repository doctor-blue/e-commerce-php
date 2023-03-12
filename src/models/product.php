<?php
class Product{
    public $id;
    public $title;
    public $price;
    public $description;
    public $category;
    public $images;

    public function getId() {
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }


    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    }


    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function getCategory(){
        return $this->category;
    }

    public function setCategory($category){
        $this->category = $category;
    }

    public function getImages(){
        return $this->images;
    }

    public function setImages($images){
        $this->images = $images;
    }
}

?>