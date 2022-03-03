<?php
require_once("../models/newsModel.php");
class newsController{
    public function getNews(){
        $mo = new newsModel();
        return $mo->getNews();
    }
    public function addNew(){
        $mo = new newsModel();
        if(isset($_POST["ajouter"])){
            $mo->addnew($_POST["titre"],$_POST["desc"],$_POST["image"]);
        }
    }
    public function deleteNew(){
        if(isset($_POST["delete"])){
            $mo = new newsModel();
            $mo->deleteNew($_POST["id"]);
        }
    }
}
?>