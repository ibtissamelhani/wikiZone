<?php

namespace app\controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
use app\models\WikiModel;
use app\entities\Wiki;

session_start();

class WikiController 
{
    public function add(){

       
            $wikiModel = new WikiModel();
            $wiki = new Wiki(null,$name);
            $wikiModel->create($Wiki);
        
    }

    public function getAll(){
        $wiki= new WikiModel();
        $wikis= $wiki->getAllWikis();
    }

    public function update(){

        $id=$_POST['id'];
        $name=$_POST['name'];
        
        $wikiModel= new WikiModel();
        $wiki = new Wiki($id,$name);
        $wikiModel->update($wiki);
      
        
    }

    public function delete(){
        $id=$_GET["id"];
        $wikiModel= new WikiModel();
        $wikiModel->delete($id);
    }

    public function getwiki()
    {
        $id=$_GET['id'];
        $wikiModel = new WikiModel();
        $wiki = $wikiModel->getUserById($id);
    }

    

}
?>