<?php

namespace app\models;
require_once __DIR__ . '/../../vendor/autoload.php';
use app\database\Connection;
use app\entities\Category;

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
        $query = $this->db->query("SELECT * from categories");
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        $categories = [];
        if(empty($rows)){
            return [];
        }else{
            foreach($rows as $row){
                $category = new Category($row['id'],$row['name']);
                $categories[] = $category;
            }
            return $categories;
        }
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