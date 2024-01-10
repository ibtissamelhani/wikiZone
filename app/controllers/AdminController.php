<?php

namespace app\controllers;

use app\controllers\TagController;


class AdminController 
{

    public function dashboard(){
        require "../../views/admin/dashboard.php";
    }
    
    public function categories(){
        require "../../views/admin/categories.php";
    }
    
   
}