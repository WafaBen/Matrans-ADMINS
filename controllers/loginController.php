<?php
require($_SERVER['DOCUMENT_ROOT']."/matrans-admins".'/models/loginModel.php');
class loginController{
    public function login(){
        if(isset($_POST["login"])){
            $m = new loginModel();
            $res = $m->login($_POST["name"],$_POST["password"]);
            if($res==0){
                return "informations erronées";
            }else{
                header("location:./vues/accueilVue.php");
            }
            
        }
    }
}

?>