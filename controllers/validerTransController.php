<?php
require('../models/validerTransModel.php');
class validertransController{
    private $m;
    function __construct(){
        $this->m = new validerTransModel();
    }
    public function getNVT(){
        return $this->m->getNVT();
    }
    public function valider(){
        if(isset($_POST["valider"])){
            $this->m->valider($_POST["id"]);
        }
    }
    
}
?>