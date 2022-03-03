<?php
class loginModel{
    public function login($u,$m){
        if(strcmp($u,"admin")==0 && strcmp($m,"admin")==0 ){
            return 1;
        }
        else{
            return 0;
        }
    }
}
?>