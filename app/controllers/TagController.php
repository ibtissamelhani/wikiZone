<?php

namespace app\controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
use app\models\TagModel;
use app\entities\tag;

session_start();

class TagController 
{
    public function add(){

        $name=$this->validation($_POST['name']);

            $tagModel = new TagModel();
            $tag = new Tag(null,$name);
            $tagModel->create($tag);
            header("location: tags");

    }

    function validation($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
      }

    public function getAll(){
        $tag= new TagModel();
        $tags= $tag->getTags();
        require "../../views/admin/tag/tags.php";
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
        header("location: tags");
    }

    public function getTag()
    {
        $id=$_GET['id'];
        $tagModel = new TagModel();
        $tagg = $tagModel->getTagById($id);
        header("location: tags");
    }

    

}
?>