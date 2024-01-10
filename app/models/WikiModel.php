<?php

namespace app\models;
require_once __DIR__ . '/../../vendor/autoload.php';
use app\database\Connection;
use app\entities\Wiki;
use PDO;


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
        $query = $this->db->query("SELECT w.*,u.firstName as firstName, u.lastName as lastName, c.name as category from wikis w 
        join users u on u.id = w.writer
        join categories c on c.id = w.category_id
        where not w.status='Archived' ");
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function getAllArchive(){
        $query = $this->db->query("SELECT w.*,u.firstName as firstName, u.lastName as lastName, c.name as category from wikis w 
        join users u on u.id = w.writer
        join categories c on c.id = w.category_id
        where w.status='Archived' ");
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function getAllPending(){
        $query = $this->db->query("SELECT w.*,u.firstName as firstName, u.lastName as lastName, c.name as category from wikis w 
        join users u on u.id = w.writer
        join categories c on c.id = w.category_id
        where w.status='Pending' ");
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function delete($id){
        $query = "DELETE from wikis where id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function getWikiById($id){
        $query ="SELECT w.*,u.firstName as firstName, u.lastName as lastName,u.profile as profile, c.name as category from wikis w 
        join users u on u.id = w.writer
        join categories c on c.id = w.category_id
        where w.id=?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}