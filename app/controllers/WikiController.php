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
        require "../../views/admin/wiki/wikis.php";
    }

    public function getArchive(){
        $wiki= new WikiModel();
        $wikis= $wiki->getAllArchive();
        require "../../views/admin/wiki/Archive.php";
    }

    public function getPending(){
        $wiki= new WikiModel();
        $wikis= $wiki->getAllPending();
        require "../../views/admin/dashboard.php";
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
        $wiki = $wikiModel->getWikiById($id);
        require "../../views/admin/wiki/details.php";
    }
    public function publish()
    {
        $id=$_GET['id'];
        $wikiModel = new WikiModel();
        $wiki = $wikiModel->publishWiki($id);
        header("location: archive");
    }
    public function archive()
    {
        $id=$_GET['id'];
        $wikiModel = new WikiModel();
        $wiki = $wikiModel->archiveWiki($id);
        header("location: archive");
    }

    

}
?>