<?php

namespace app\controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
use app\models\CategoryModel;
use app\entities\Category;

session_start();

class CategoryController 
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
            $categoryModel = new ModelModel();
            $category = new Category(null,$name);
            $categoryModel->create($category);
        }
        // header('location:../category');
    }

    public function getAll(){
        $category= new CategoryModel();
        $categories= $category->getCategories();
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
        $categoryModel= new CategoryModel();
        $category = new Category($id,$name);

        $categoryModel->update($category);
      
        // header('location:../category');
        
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