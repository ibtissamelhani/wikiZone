<?php

namespace app\controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
use app\models\WikiModel;
use app\models\CategoryModel;
use app\models\TagModel;
use app\models\UserModel;
use app\entities\Wiki;

session_start();

class WikiController 
{
    public function add()
    {
            $title = $_POST['title'];
            $category = $_POST['category'];
            $tags = $_POST['tags'] ?? [];
            $content = $_POST['content'];
            $userId = $_POST['userId'];
            $status = "Pending";
            $photo = $_FILES['photo']['name'];
            $photoTemp = $_FILES['photo']['tmp_name'];
            $folder = '/wikizone/public/imgs/'.$photo;

           
            $wiki = new Wiki(null,$title,$content,$status,$folder,$userId,$category);
            $wikiModel = new WikiModel();
            $wikiModel->create($wiki, $tags);
            header("Location: profile?id=$userId");
            
            
        
    }
    public function update(){

        $id = $_POST['wikiId'];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $tags = $_POST['tags'] ?? [];
        $content = $_POST['content'];
        $userId = $_POST['userId'];
        $photo = $_FILES['photo']['name'];
        $photoTemp = $_FILES['photo']['tmp_name'];
        $folder = '/wikizone/public/imgs/'.$photo;
        
        $wiki = new Wiki($id,$title,$content,null,$folder,$userId,$category);
        $wikiModel = new WikiModel();
        $wikiModel->update($wiki, $tags);
        header("Location: profile?id=$userId");
  
    }

    public function addWiki(){

        $category= new CategoryModel();
        $categories= $category->getCategories();

        $tag= new TagModel();
        $tags= $tag->getTags();

        require "../../views/user/addWiki.php";

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

    public function getPublished(){
        $wiki= new WikiModel();
        $wikis= $wiki->getAllPublished();

        $category= new CategoryModel();
        $categories= $category->getCategories();

        $tag= new TagModel();
        $tags= $tag->getLimitTags();
        require "../../views/user/home.php";
    }

    public function getUserWikis(){
        $id=$_GET["id"];
        $wiki= new WikiModel();
        $wikis= $wiki->getUserWikis($id);

        require "../../views/user/profile.php";
    }

    public function getWikisByCategory(){
        $id=$_GET["id"];
        $wiki= new WikiModel();
        $wikis= $wiki->getWikisByCat($id);
        require "../../views/user/wikiByCat.php";
    }

   

    public function delete(){
        $id=$_GET["id"];
        $userId=$_GET["userId"];
        $wikiModel= new WikiModel();
        $wikiModel->delete($id);
        header("Location: profile?id=$userId");

    }

    public function getwiki()
    {
        $id=$_GET['id'];
        $wikiModel = new WikiModel();
        $wiki = $wikiModel->getWikiById($id);
        require "../../views/admin/wiki/details.php";
    }

    public function editWiki(){
        $id=$_GET['id'];
        $wikiModel = new WikiModel();
        $wiki = $wikiModel->getWikiById($id);

        $category= new CategoryModel();
        $categories= $category->getCategories();

        $tag= new TagModel();
        $tags= $tag->getTags();
        require "../../views/user/editWiki.php";
    }

    public function readwiki()
    {
        $id=$_GET['id'];
        $wikiModel = new WikiModel();
        $wiki = $wikiModel->getWikiById($id);
        require "../../views/user/read.php";
    }
    public function publish()
    {
        $id=$_GET['id'];
        $wikiModel = new WikiModel();
        $wiki = $wikiModel->publishWiki($id);
        header("location: dashboard");
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