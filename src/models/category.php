<?php 

class Category{
    public $id;
    public $title;

    public function getId() {
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

}
?>