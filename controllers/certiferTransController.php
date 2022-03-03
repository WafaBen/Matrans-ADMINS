<?php
require('../models/certiferTransModel.php');
class certifertransController{
    private $m;
    function __construct(){
        $this->m = new certiferTransModel();
    }
    public function getNVT(){
        return $this->m->getNVT();
    }
    public function validate(){
        if(isset($_POST["valider"])){
            $this->m->validate($_POST["id"]);
        }
    }
    public function certify(){
        if(isset($_POST["certifier"])){
            $this->m->certify($_POST["id"]);
        }
    }
    public function refuse(){
        if(isset($_POST["refuser"])){
            $this->m->refuse($_POST["id"]);
        } 
    }
}
?>