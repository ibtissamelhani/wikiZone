<?php

namespace app\controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
use app\models\TagModel;
use app\entities\tag;

session_start();

class TagController 
{
    public function add(){

        $name=$_POST['name'];

        if (empty($name)) {
            $_SESSION['error_name'] = "Name category is required";
        } elseif (strlen($name) < 3) {
            $_SESSION['error_name'] = "Name must be at least 3 characters";
        } else {
            $_SESSION['error_name'] = "";
        }
        if(empty($_SESSION['error_name'])){
            $tagModel = new TagModel();
            $tag = new Tag(null,$name);
            $tagModel->create($tag);
        }
    }

    public function getAll(){
        $tag= new TagModel();
        $tags= $tag->getTags();
    }

    public function update(){

       
        $tagModel= new TagModel();
        $tag = new Tag($id,$name);

        $tagModel->update($tag);
      
        
    }

    public function delete(){
        $id=$_GET["id"];
        $tagModel= new TagModel();
        $tagModel->delete($id);
    }

    public function getTag()
    {
        $id=$_GET['id'];
        $tagModel = new TagModel();
        $tag = $tagModel->getTagById($id);
    }

    

}
?>