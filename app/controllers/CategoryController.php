<?php

namespace app\controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
use app\models\CategoryModel;
use app\entities\Category;

session_start();

class CategoryController 
{
    public function add(){

        $name=$this->validation($_POST['name']);

       
            $categoryModel = new CategoryModel();
            $category = new Category(null,$name);
            $categoryModel->create($category);
        
         header('location: categories');
    }

    function validation($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
      }
    public function getAll(){
        $category= new CategoryModel();
        $categories= $category->getCategories();
        require "../../views/admin/category/categories.php";
    }

    public function update(){

        $id=$_POST['id'];
        $name=$_POST['name'];
        $categoryModel= new CategoryModel();
        $category = new Category($id,$name);

        $categoryModel->update($category);
      
  
        
    }

    public function delete(){
        $id=$_GET["id"];
        $categoryModel= new CategoryModel();
        $categoryModel->delete($id);
        // header('location:../category');
    }

    public function getCategory()
    {
        $id=$_GET['id'];
        $categoryModel = new CategoryModel();
        $cat = $categoryModel->getCategoryById($id);
        // require_once '../../views/admin/categoryEdit.php';
    }

    

}
?>