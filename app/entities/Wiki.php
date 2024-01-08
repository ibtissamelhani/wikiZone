<?php

namespace app\entities;

class Wiki 
{
    private $id;
    private $title;
    private $content;
    private $date;
    private $status;
    private $photo;
    private $author_id;
    private $category_id;

    public function __construct($id,$title ,$content,$status,$photo,$author_id,$category_id,$tag_id){
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->status = $status;
        $this->photo = $photo;
        $this->author_id = $author_id;
        $this->category_id = $category_id;
        $this->tag_id = $tag_id;
    }
    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getContent(){
        return $this->content;
    }
    public function getDate(){
        return $this->date;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getPhoto(){
        return $this->photo;
    }
    public function getAuthorId(){
        return $this->author_id;
    }
    public function getCategoryId(){
        return $this->category_id;
    }
  

    public function setId($id){
        $this->id = $id;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setContent($content){
        $this->content = $content;
    }
  
    public function setCategoryId($category_id){
        $this->category_id = $category_id;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function setPhoto($photo){
        $this->photo = $photo;
    }
    public function setAuthorId($author_id){
        $this->author_id = $author_id;
    }
    




  

}
?>