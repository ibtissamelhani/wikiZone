<?php

namespace app\models;
require_once __DIR__ . '/../../vendor/autoload.php';
use app\database\Connection;
use app\entities\Category;
use PDO;

class CategoryModel {

    private $db;

    public function __construct(){
        $this->db = Connection::getInstence()->getConnect();
    }

    public function create(Category $category){
        $stmt= $this->db->prepare("INSERT INTO categories (name) 
        VALUES (:name)");
        $stmt->bindParam(':name', $category->getName());
        $stmt->execute();
    }

    public function update(Category $category){
        $stmt= $this->db->prepare("UPDATE categories 
        SET name = :name
        where id = :id"); 
        $stmt->bindParam(':id', $category->getId());
        $stmt->bindParam(':name', $category->getName());

        $stmt->execute();
    }

    public function getCategories(){
        $stmt = $this->db->prepare("SELECT * from categories");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function delete($id){
        $query = "DELETE from categories where id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function getCategoryById($id){
        $query ="SELECT * from categories where id=?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }


    }


?>