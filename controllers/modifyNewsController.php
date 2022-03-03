<?php
require("../models/modifyNewModel.php");
class modifyNewsController{
    private $m;
    function __construct(){
        $this->m = new modifyNewModel();
    }
    public function getNew($id){
        return $this->m->getNew($id);
    }
    public function modify(){
        if(isset($_POST["modify"])){
            $this->m->modify($_POST["titre"],$_POST["desc"],$_POST["image"],$_POST["id"]);
        }
    }
}
?>