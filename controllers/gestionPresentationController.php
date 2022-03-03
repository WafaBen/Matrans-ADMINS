<?php
require('../models/gestionPresentationModel.php');
class gestionPresentationController{
    private $m;
    function __construct(){
        $this->m = new gestionPresentationModel();
    }
    public function getDescription(){
        return $this->m->getDescription();
    }
    public function getVideo(){
        return $this->m->getVideo();
    }
    public function setDescription(){
        if(isset($_POST["description"])){
            $this->m->setDescription($_POST["desc"]);
        }
    }
    public function setVideo(){
        if(isset($_POST["video"])){
            $this->m->setVideo($_POST["file"]);
        }
    }

}
?>