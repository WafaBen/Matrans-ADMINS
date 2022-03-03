<?php
require('../models/gestionAccueilModel.php');
class gestionAccueilController{
    private $m;
    function __construct(){
        $this->m = new gestionAccueilModel(); 
    }
    public function getDiapo(){
        return $this->m->getDiapo();
    }
    public function setImage(){
        if(isset($_POST["change"])){
            $this->m->setImage($_POST["id"],$_POST["file"],$_POST["link"]);
        }
    }
    public function getCritere(){
        return $this->m->getCriteres();
    }
    public function setCritere(){
        if(isset($_POST["critere"])){
            $this->m->setCritere($_POST["choix"]);
        }
    }
}
?>