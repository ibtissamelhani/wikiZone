<?php

namespace app\controllers;


class AdminController 
{

    public function dashboard(){
        require "../../views/admin/dashboard.php";
    }
    public function users(){
        require "../../views/admin/users.php";
    }
    public function categories(){
        require "../../views/admin/categories.php";
    }
    public function wikis(){
        require "../../views/admin/wikis.php";
    }
    public function tags(){
        require "../../views/admin/tags.php";
    }
}