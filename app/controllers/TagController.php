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
        // header('location:../category');
    }

    public function getAll(){
        $tag= new TagModel();
        $tags= $tag->getTags();
        // require_once '../../views/admin/category.php';
    }

    public function update(){

        $id=$_POST['id'];
        $name=$_POST['name'];

        // if (empty($name)) {
        //     $_SESSION['error_name'] = "Name category is required";
        // } elseif (strlen($name) < 3) {
        //     $_SESSION['error_name'] = "Name must be at least 3 characters";
        // } else {
        //     $_SESSION['error_name'] = "";
        // }
        $tagModel= new TagModel();
        $tag = new Tag($id,$name);

        $tagModel->update($tag);
      
        // header('location:../category');
        
    }

    public function delete(){
        $id=$_GET["id"];
        $tagModel= new TagModel();
        $tagModel->delete($id);
        // header('location:../category');
    }

    public function getTag()
    {
        $id=$_GET['id'];
        $tagModel = new TagModel();
        $tag = $tagModel->getTagById($id);
        // require_once '../../views/admin/categoryEdit.php';
    }

    

}
?>