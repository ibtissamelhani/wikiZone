<?php

namespace app\models;
require_once __DIR__ . '/../../vendor/autoload.php';
use app\database\Connection;
use app\entities\User;
use PDO;

class UserModel {

    private $db;

    public function __construct(){
        $this->db = Connection::getInstence()->getConnect();
    }

    public function create(User $user){
        $stmt= $this->db->prepare("INSERT INTO users (firstName,lastName,email,password,profile,role_id ) 
        VALUES (:firstName,:lastName,:email,:password,:profile,:role_id)");
        $stmt->bindValue(':firstName', $user->getFirstName());
        $stmt->bindValue(':lastName', $user->getLastName());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':profile', "/wikizone/public/imgs/profile.jpg");
        $stmt->bindValue(':role_id', 2);
        $stmt->execute();
    }

    public function update(User $user){
        $stmt= $this->db->prepare("UPDATE users 
        SET firstName = :firstName, lastName=:lastName,email=:email,password=:password,profile=:profile,role_id=:role_id 
        where id = :id"); 
        $stmt->bindParam(':id', $user->getId());
        $stmt->bindParam(':firstName', $user->getFirstName());
        $stmt->bindParam(':lastName', $user->getLastName());
        $stmt->bindParam(':email', $user->getEmail());
        $stmt->bindParam(':password', $user->getPassword());
        $stmt->bindParam(':profile', $user->getProfile());
        $stmt->bindParam(':role_id', $user->getRoleId());
        $stmt->execute();
    }

    public function getAllUsers(){
        $query = $this->db->query("SELECT u.*, r.name as role from users u
        join roles r on r.id=u.role_id");
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function delete($id){
        $query = "DELETE from users where id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function getUserById($id){
        $query ="SELECT * from users where id=?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public  function getUserByEmail($email)
    {
        $sql = "SELECT users.*, roles.name as role FROM users
        LEFT JOIN roles ON users.role_id = roles.id
        WHERE users.email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
      
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;

        }


    public function countUsers(){
    $sql="SELECT COUNT(*) as num_users from users";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['num_users'];
    }


    }


?>