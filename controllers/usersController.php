<?php
require('../models/usersModel.php');
class usersController{
    private $m;
    function __construct(){
        $this->m = new usersModel();
    }
    function getUsers(){
        return $this->m->getUsers();
    }
    function deleteUser(){
        if(isset($_POST["delete"])){
            $id =  $_POST["id"];
            $res = $this->m->deleteUser($id);
            if($res==0){
                return true;
            }
            else{
                return false;
            }
        }
    }
    function getUser(){
        if(isset($_POST["modifier"])){
            return $this->m->getUser($_POST["id"]);
        }
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
    
}
?>