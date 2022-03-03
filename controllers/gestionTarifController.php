<?php
require('../models/gestionTarifModel.php');
class gestionTarifController{
    private $m;
    function __construct(){
        $this->m = new gestionTarifModel();
    }
    public function getPourcentages(){
        return $this->m->getPourcentages();
    }
    public function addPourcentage(){
        if(isset($_POST["ajouter"])){
            $this->m->addPourcentage($_POST["min"],$_POST["max"],$_POST["pourcentage"]);
        }
    }
    public function suppPourcentage(){
        if(isset($_POST["supprimer"])){
            $this->m->suppPourcentage($_POST["id"]);
        }
    }
    public function getWilayas(){
        return $this->m->getWilayas();
    }
    public function getTarifs(){
        return $this->m->getTarifs();
    }
    public function getWilaya($id){
        return $this->m->getWilaya($id)[0];
    }
    public function addTarif(){
        if(isset($_POST["ajouterT"])){
            $this->m->addTarif($_POST["wilayaA"],$_POST["wilayaB"],$_POST["prix"]);
        }
    }
    public function suppTarif(){
        if(isset($_POST["supprimerT"])){
            $this->m->suppTarif($_POST["idT"]);
        }
    }
}
?>  