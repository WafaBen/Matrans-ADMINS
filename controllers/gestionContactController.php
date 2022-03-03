<?php
require('../models/gestionContactsModel.php');
class gestionContactController{
    private $m;
    function __construct(){
        $this->m = new gestionContactsModel();
    }
    public function getContacts(){
        return $this->m->getContacts();
    }
    public function setContact(){
        if(isset($_POST["sauv"])){
            $this->m->setContact($_POST["id"],$_POST["info"],$_POST["link"]);
        }
    }
    public function addContact(){
        if(isset($_POST["ajout"])){
            $this->m->addContact($_POST["file"],$_POST["info"],$_POST["link"]);
        }
    }
    public function deleteContact(){
        if(isset($_POST["supp"])){
            $this->m->supprimer($_POST["id"]);
        }
    }
}
?>