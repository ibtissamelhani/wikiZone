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


    public function create(Wiki $wiki, array $tagIds) {
        try {
            $this->db->beginTransaction();
    
            $stmt = $this->db->prepare("INSERT INTO wikis (title, content, status, photo, writer, category_id) 
                VALUES (:title, :content, :status, :photo, :writer, :category_id)");
    
            $stmt->bindValue(':title', $wiki->getTitle());
            $stmt->bindValue(':content', $wiki->getContent());
            $stmt->bindValue(':status', $wiki->getStatus());
            $stmt->bindValue(':photo', $wiki->getPhoto());
            $stmt->bindValue(':writer', $wiki->getAuthorId());
            $stmt->bindValue(':category_id', $wiki->getCategoryId());
    
            $stmt->execute();
    
            $wikiId = $this->db->lastInsertId();
    
            $sql = $this->db->prepare("INSERT INTO wiki_tags (wiki_id, tag_id) VALUES (?, ?)");
    
            foreach ($tagIds as $tagId) {
                $sql->bindValue(1, $wikiId);
                $sql->bindValue(2, $tagId);
                $sql->execute();
            }
    
            $this->db->commit();
        } catch (PDOException $e) {
            // Roll back the transaction upon failure
            $this->db->rollBack();
            // Handle exception or log error
            echo "Error: " . $e->getMessage();
        }
    }
    

    public function update(Wiki $wiki, array $tagIds){
        try {
            // Begin transaction
            $this->db->beginTransaction();
    
            $stmt= $this->db->prepare("UPDATE wikis 
            SET title = :title, content=:content,status=:status,photo=:photo,writer=:writer,category_id=:category_id 
            where id = :id"); 
            $stmt->bindValue(':title', $wiki->getTitle());
            $stmt->bindValue(':content', $wiki->getContent());
            $stmt->bindValue(':status', $wiki->getStatus());
            $stmt->bindValue(':photo', $wiki->getPhoto());
            $stmt->bindValue(':writer', $wiki->getAuthorId());
            $stmt->bindValue(':category_id', $wiki->getCategoryId());
            $stmt->bindValue(':id', $wiki->getId());

            $stmt->execute();
            // delete old tags
            $deleteStmt = $this->db->prepare("DELETE FROM wiki_tags WHERE wiki_id = ?");
            $deleteStmt->execute([$wiki->getId()]);

            // add new tags
            $insertStmt = $this->db->prepare("INSERT INTO wiki_tag (wiki_id, tag_id) VALUES (?, ?)");
            foreach ($tagIds as $tagId) {
                $insertStmt->execute([$wiki->getId(), $tagId]);
            }

            $this->db->commit();
            } catch (PDOException $e) {
                // Roll back the transaction upon failure
                $this->db->rollBack();
                // Handle exception or log error
                echo "Error: " . $e->getMessage();
            }
    }




    public function getAllWikis(){
        $query = $this->db->query("SELECT wikis.*, users.id as writer_id, users.firstName as firstName, users.lastName as lastName, categories.id as category_id, categories.name as category, GROUP_CONCAT(tags.name) as tags
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
        $query = $this->db->query("SELECT wikis.*, users.id as writer_id, users.firstName as firstName, users.lastName as lastName, categories.id as category_id, categories.name as category, GROUP_CONCAT(tags.name) as tags
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
        $query = $this->db->query("SELECT wikis.*, users.id as writer_id, users.firstName as firstName, users.lastName as lastName, categories.id as category_id, categories.name as category, GROUP_CONCAT(tags.name) as tags
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

    public function getAllPublished(){
        $query = $this->db->query("SELECT wikis.* , SUBSTRING_INDEX(content, ' ', 10) AS extracted_words, users.id as writer_id, users.firstName as firstName, users.lastName as lastName, categories.id as category_id, categories.name as category, GROUP_CONCAT(tags.name) as tags
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
    where wikis.status='Published'  
    GROUP BY
        wikis.id; ");
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }


    public function getUserWikis($id){

        $stmt = $this->db->prepare("SELECT wikis.*, users.id as writer_id, users.firstName as firstName, users.lastName as lastName, categories.id as category_id, categories.name as category, GROUP_CONCAT(tags.name) as tags
            FROM wikis
            LEFT JOIN users ON wikis.writer = users.id
            LEFT JOIN categories ON wikis.category_id = categories.id
            LEFT JOIN wiki_tags ON wikis.id = wiki_tags.wiki_id
            LEFT JOIN tags ON wiki_tags.tag_id = tags.id
            WHERE wikis.writer = :id
            GROUP BY wikis.id");
    
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function getWikisByCat($id){

        $stmt = $this->db->prepare("SELECT wikis.*, SUBSTRING_INDEX(content, ' ', 10) AS extracted_words, users.id as writer_id, users.firstName as firstName, users.lastName as lastName, categories.id as category_id, categories.name as category, GROUP_CONCAT(tags.name) as tags
            FROM wikis
            LEFT JOIN users ON wikis.writer = users.id
            LEFT JOIN categories ON wikis.category_id = categories.id
            LEFT JOIN wiki_tags ON wikis.id = wiki_tags.wiki_id
            LEFT JOIN tags ON wiki_tags.tag_id = tags.id
            WHERE wikis.category_id = :id
            GROUP BY wikis.id");
    
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    



    public function delete($id){

     try {

      $this->db->beginTransaction();


      $query = "delete from wiki_tags where wiki_id = ?";
      $stmt = $this->db->prepare($query);
      $stmt->execute([$id]);

      $sql = "delete from wikis where id = ?";
      $stmt = $this->db->prepare($sql);
      $stmt->execute([$id]);

      $this->db->commit();

     } catch(PDOException $e) {
      $this->db->rollBack();
      echo "Error :" . $e->getMessage();
     }
  }

    public function getWikiById($id){
        $query ="SELECT wikis.*, users.id as writer_id, users.firstName as firstName,users.profile as profile, users.lastName as lastName, categories.id as category_id, categories.name as category, GROUP_CONCAT(tags.name) as tags
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
        $sql="SELECT COUNT(*) as num_wikis from wikis";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }
}