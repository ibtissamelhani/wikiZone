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
        $query = $this->db->query("SELECT wikis.*, users.id as writer_id, users.firstName as writer_name, categories.id as category_id, categories.name as category_name, GROUP_CONCAT(tags.name) as tags
    FROM
        wikis
    LEFT JOIN
        users ON wikis.writer = users.id
    LEFT JOIN
        categories ON wikis.category_id = categories.id
    LEFT JOIN
        wiki_tags ON wikis.id = wiki_tags.wiki_id
    LEFT JOIN
        tags ON wiki_tags.tag_id = tags.id
    where not wikis.status='Archived'
    GROUP BY
        wikis.id;
    ");

        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }


    public function getAllArchive(){
        $query = $this->db->query("SELECT wikis.*, users.id as writer_id, users.firstName as writer_name, categories.id as category_id, categories.name as category_name, GROUP_CONCAT(tags.name) as tags
    FROM
        wikis
    LEFT JOIN
        users ON wikis.writer = users.id
    LEFT JOIN
        categories ON wikis.category_id = categories.id
    LEFT JOIN
        wiki_tags ON wikis.id = wiki_tags.wiki_id
    LEFT JOIN
        tags ON wiki_tags.tag_id = tags.id
    where wikis.status='Archived' 
    GROUP BY
        wikis.id;
        ");
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }


    public function getAllPending(){
        $query = $this->db->query("SELECT wikis.*, users.id as writer_id, users.firstName as writer_name, categories.id as category_id, categories.name as category_name, GROUP_CONCAT(tags.name) as tags
    FROM
        wikis
    LEFT JOIN
        users ON wikis.writer = users.id
    LEFT JOIN
        categories ON wikis.category_id = categories.id
    LEFT JOIN
        wiki_tags ON wikis.id = wiki_tags.wiki_id
    LEFT JOIN
        tags ON wiki_tags.tag_id = tags.id
    where wikis.status='Pending'  
    GROUP BY
        wikis.id; ");
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
        $query ="SELECT wikis.*, users.id as writer_id, users.firstName as writer_name, categories.id as category_id, categories.name as category_name, GROUP_CONCAT(tags.name) as tags
        FROM
            wikis
        LEFT JOIN
            users ON wikis.writer = users.id
        LEFT JOIN
            categories ON wikis.category_id = categories.id
        LEFT JOIN
            wiki_tags ON wikis.id = wiki_tags.wiki_id
        LEFT JOIN
            tags ON wiki_tags.tag_id = tags.id
        where wikis.id=? ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function publishWiki($id){
        $stmt= $this->db->prepare("UPDATE wikis 
        SET status='Published'
        where id = :id"); 
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function archiveWiki($id){
        $stmt= $this->db->prepare("UPDATE wikis 
        SET status='Archived'
        where id = :id"); 
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function countWiki(){
        $sql="SELECT COUNT(*) as num_users from wikis";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }
}