<?php
require('../models/transporteursModel.php');
class transporteursController{
    private $m;
    function __construct(){
        $this->m = new transporteursModel(); 
    }
    public function getTrans(){
        return $this->m->gettrans();
    }
    function banir(){
        if(isset($_POST["banir"])){
            $this->m->banir($_POST["id"]);
        } 

    }
    function trier(){
        if(isset($_POST["trier"]))
        {  
            if($_POST["triVal"]=="nom"){
               return $this->m->trierNom();
           }
           if($_POST["triVal"]=="prenom"){
               return $this->m->trierPrenom();
           }
           if($_POST["triVal"]=="id"){
               return $this->m->trierId();
           } 
        }
    }
    function filter(){
        if(isset($_POST["filtrer"])){
            return $this->m->filtrerWilaya($_POST["wil"]);
        }
    }
    public function getNbTransNonCert(){
        return $this->m->getNbTransNonCert();
    }
    public function getNbTransNonValid(){
        return $this->m->getNbTransNonValid();
    }
}
?>