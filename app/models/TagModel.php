<?php

namespace app\models;
require_once __DIR__ . '/../../vendor/autoload.php';
use app\database\Connection;
use app\entities\Tag;

class TagModel {

    private $db;

    public function __construct(){
        $this->db = Connection::getInstence()->getConnect();
    }

    public function create(Tag $tag){
        $stmt= $this->db->prepare("INSERT INTO tags (name) 
        VALUES (:name)");
        $stmt->bindParam(':name', $tag->getName());
        $stmt->execute();
    }

    public function update(Tag $tag){

        $stmt= $this->db->prepare("UPDATE tags 
        SET name = :name
        where id = :id"); 
        $stmt->bindParam(':id', $tag->getId());
        $stmt->bindParam(':name', $tag->getName());

        $stmt->execute();
    }

    public function getTags(){
        $query = $this->conn->query("SELECT * from tags");
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        $tags = [];
        if(empty($rows)){
            return [];
        }else{
            foreach($rows as $row){
                $tag = new Tag($row['id'],$row['name']);
                $tags[] = $tag;
            }
            return $tags;
        }
    }

    public function delete($id){
        $query = "DELETE from tags where id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function getTagById($id){
        $query ="SELECT * from tags where id=?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }


    }


?>