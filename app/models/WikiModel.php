<?php

namespace app\models;
require_once __DIR__ . '/../../vendor/autoload.php';
use app\database\Connection;
use app\entities\Wiki;


class WikiModel 
{
    private $db;

    public function __construct(){
        $this->db = Connection::getInstence()->getConnect();
    }


    public function create(Wiki $wiki){
        $stmt= $this->db->prepare("INSERT INTO wikis (title,content,status,photo,writer,category_id ) 
        VALUES (:title,:content,:status,:photo,:writer,:category_id");
        $stmt->bindParam(':title', $wiki->getTitle());
        $stmt->bindParam(':content', $wiki->getContent());
        $stmt->bindParam(':status', $wiki->getStatus());
        $stmt->bindParam(':photo', $wiki->getPhoto());
        $stmt->bindParam(':writer', $wiki->getAuthorId());
        $stmt->bindParam(':category_id', $wiki->getCategoryId());
        $stmt->execute();
    }

    public function update(Wiki $wiki){
        $stmt= $this->db->prepare("UPDATE wikis 
        SET title = :title, content=:content,status=:status,photo=:photo,writer=:writer,category_id=:category_id 
        where id = :id"); 
        $stmt->bindParam(':title', $wiki->getTitle());
        $stmt->bindParam(':content', $wiki->getContent());
        $stmt->bindParam(':status', $wiki->getStatus());
        $stmt->bindParam(':photo', $wiki->getPhoto());
        $stmt->bindParam(':writer', $wiki->getAuthorId());
        $stmt->bindParam(':category_id', $wiki->getCategoryId());
        $stmt->execute();
    }


    public function getAllWikis(){
        $query = $this->db->query("SELECT * from wikis");
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        $wikis = [];
        if(empty($rows)){
            return [];
        }else{
            foreach($rows as $row){
                $wiki = new Wiki($row['title'],$row['content'],$row['status'],$row['photo'],$row['writer'],$row['category_id']);
                $wikis[] = $wiki;
            }
            return $wikis;
        }
    }
    public function delete($id){
        $query = "DELETE from wikis where id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function getUserById($id){
        $query ="SELECT * from wikis where id=?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}
