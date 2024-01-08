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

    public function createUser(){

        $this->validation($f_name,$l_name,$email,$password,$r_password);

        if(empty($_SESSION['nameErr']) && empty($_SESSION['emailErr']) && empty($_SESSION['passErr']) && empty($_SESSION['r_passErr'])){
            $password = password_hash($password, PASSWORD_BCRYPT);
            $userModel = new UserModel();
            $user = new User(null, $firstName,$lastName,$email,$password,null,null);
            $userModel->create($user); 
            $this->redirect("../../views/Auth/signin.php");
        }
        else{
            $this->redirect("../../views/Auth/signup.php");
            exit();
        }
    }

    public function validation($f_name,$l_name,$email,$password,$r_password){

        if(empty($f_name)){
            $_SESSION['nameErr'] = "first name is required";
        }else{
            $_SESSION['nameErr'] = "";
        }
        if(empty($email)){
            $_SESSION['emailErr'] = "email is required";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['emailErr'] = "invalid email";
        }else{
            $_SESSION['emailErr'] = "";
        }

        if(empty($password)){
            $_SESSION['passErr'] = "password is required";
        }elseif(strlen($password) < 9){
            $_SESSION['passErr'] = "at least 8 carac";
        }else{
            $_SESSION['passErr'] = "";
        }

        if(empty($r_password)){
            $_SESSION['r_passErr'] = "repeat password";
        }elseif($password != $r_password){
            $_SESSION['r_passErr'] = "password doesn't match";
        }else{
            $_SESSION['r_passErr'] = "";
        }
    }



    public function getUserByEmail(){

        // validation email et password
        if(empty($email)) {
            $_SESSION['emailEr'] = "email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailEr']="invalid email";
        }else{
            $_SESSION['emailEr']="";
        }

        if(empty($password)) {
            $_SESSION['passwordErr']= "password is required";
        }  elseif (strlen($password) < 9) {
             $_SESSION['passwordError']= "at least 8 caract";
         }else{
            $_SESSION['passwordErr']="";
        }

        if(empty($_SESSION['emailEr']) && empty($_SESSION['passwordErr'])){
            $userModel = new UserModel();
            $row = $userModel->getUserByEmail($email);
            if($row) {

                    if(password_verify($password, $row['password'])){
                            $_SESSION['userId'] = $row['id'];
                            $_SESSION['loggedIn'] = true;
                            $_SESSION['role_id'] =$row['role_id'];

                            if($row['role_id'] === 1){
                                header("location:../../views/admin/dashboard.php");
                            }else{
                                header("location../../views/user/home.php");
                            } 
                    }
            }else {
                $_SESSION['message'] = "this email doesn't existe";
                header("location: ../../views/Auth/login.php");
            }
        } else{
            header(" location../../Auth/views/login.php");
            exit();
        }
    }
    

    public function updateUser() {
        $user = new User($id,$first_name,$last_name,$email,$password,$phone);
        $userModel = new UserModel();
        $userModel->update($user);
    }

    public function delete(){
        $userModel = new UserModel();
        $userModel->delete($id);
    }

    public function getUsers(){
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();
    }

    public function getUserById(){
        $userModel = new UserModel();
        $user = $userModel->getUserById($id);
    }
    

}
?>