<?php
require_once("../models/modifyUserModel.php");
class modifyUserController{
    private $m;
    function __construct(){
        $this->m = new modifyModalUser();
    }
    public function getUser($id){
        return $this->m->getUser($id);
        
        
    }
}
?>