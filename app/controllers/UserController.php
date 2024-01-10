<?php

namespace app\controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
use app\models\UserModel;
use app\entities\User;

session_start();
class UserController 
{

    public function home(){
        require "../../views/user/home.php";
    }

    public function signup(){
        require "../../views/Auth/signup.php";
    }
    public function login(){
        require "../../views/Auth/signin.php";
    }

    public function createUser(){

        $first_name = $this->validation($_POST['first_name']);
        $last_name = $this->validation($_POST['last_name']);
        $email = $this->validation($_POST['email']);
        $password = $this->validation($_POST['password']);
        $repeat_pwd = $this->validation($_POST['repeat_pwd']);

        $password = password_hash($password, PASSWORD_BCRYPT);
        $userModel = new UserModel();
        $user = new User(null, $first_name,$last_name,$email,$password,null,null);
        $result = $userModel->create($user); 

        if (!$result) {
            header("location: signin");
        } else {
            header("location: signup");
        }

    }

 
        function validation($input) {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
          }
    



    public function getUserByEmail(){

        $email = $this->validation($_POST['email']);
        $password = $this->validation($_POST['password']);
        
        $userModel = new UserModel();
        $row = $userModel->getUserByEmail($email);
        if($row) {

                    if(password_verify($password, $row['password'])){
                            $_SESSION['userId'] = $row['id'];
                            $_SESSION['loggedIn'] = true;
                            $_SESSION['role_id'] =$row['role_id'];

                            if($row['role_id'] === 1){
                                header("location: dashboard");
                            }else{
                                header("location: home");
                            } 
                    }
            }else {
                $_SESSION['message'] = "this email doesn't existe";
                header("location: signin");
            }
        
    }
    

    public function updateUser() {
        $user = new User($id,$first_name,$last_name,$email,$password,$phone);
        $userModel = new UserModel();
        $userModel->update($user);
    }

    public function delete(){
        $id = $_GET['id'];
        $userModel = new UserModel();
        $userModel->delete($id);
        header("location: users");
    }

    public function getUsers(){
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();
        require "../../views/admin/user/users.php";
    }

    public function getUserById(){
        $userModel = new UserModel();
        $user = $userModel->getUserById($id);
    }

    public function logout(){
        
        session_destroy();
        header("location: home");
        }
    
    

}
?>