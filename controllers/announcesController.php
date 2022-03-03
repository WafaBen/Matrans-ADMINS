<?php
require('../models/announcesModel.php');
class announcesController{
    private $m;
    public function __construct(){
        $this->m = new announcesModel();
    }
    public function getWilaya($id){
        return $this->m->getWilaya($id);
    }
    public function getPoids($id){
        return $this->m->getPoids($id);
    }
    public function getVolume($id){
        return $this->m->getVolume($id);
    }
    public function getMoy($id){
        return $this->m->getMoy($id);
    }
    public function getTypeT($id){
        return $this->m->getTypeT($id);
    }
    public function getAnnounces(){
        return $this->m->getAnnounces();
    }
    public function filtrer(){
        if(isset($_POST["filtrer"])){
            if($_POST["filtre"]=="v"){
                return $this->m->announcesValides();
            }
            if($_POST["filtre"]=="nV"){
                return $this->m->announcesNonValides();
            }
            if($_POST["filtre"]=="c"){
                return $this->m->getAnnounceC();
            }
            if($_POST["filtre"]=="t"){
                return $this->m->getAnnounceT();
            }
            if($_POST["filtre"]=="1"){
                return $this->m->getAnnounceWilaya(1);
            }
            if($_POST["filtre"]=="2"){
                return $this->m->getAnnounceWilaya(2);
            }
            if($_POST["filtre"]=="3"){
                return $this->m->getAnnounceWilaya(3);
            }
            if($_POST["filtre"]=="9"){
                return $this->m->getAnnounceWilaya(9);
            }
            if($_POST["filtre"]=="16"){
                return $this->m->getAnnounceWilaya(16);
            }
            if($_POST["filtre"]=="26"){
                return $this->m->getAnnounceWilaya(26);
            }
        }
    }
    public function trierDate(){
        if(isset($_POST["trier"])){
            return $this->m->trierDate();
        }
    }
    public function annoncesArchiv(){
        return $this->m->annoncesArchiv();
    }
    public function deleteAnnonce(){
        if(isset($_POST["annuler"])){
            $this->m->deleteAnnonce($_POST["id"]);
        }
    }
    public function validerAnnonce(){
        if(isset($_POST["valide"])){
            $this->m->validerAnnonce($_POST["id"]);
        }
    }
}
?>