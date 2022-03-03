<?php
class announcesModel{
    public function getWilaya($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM wilayas WHERE id =:id");
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        } 
    }
    public function getPoids($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT min,max FROM fourchettesp WHERE id =:id");
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        } 
    }
    public function getVolume($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT min,max FROM fourchettesv WHERE id =:id");
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        } 
    }
    public function getMoy($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM moyT WHERE id =:id");
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
    public function getTypeT($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM typetransport WHERE id =:id");
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
    public function getAnnounces(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM annonce");
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
    public function announcesValides(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM annonce WHERE valide=:v");
            $stmt->bindValue( ":v", 1, PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
    public function announcesNonValides(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM annonce WHERE valide=:v");
            $stmt->bindValue( ":v", 0, PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
    public function getC($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT transporteur FROM users WHERE id=:id");
            $stmt->bindValue( ":id",$id, PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll();
            if($res[0]["transporteur"]==0){
                return 0;
            }
            else{
                return 1;
            }
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
    public function getAnnounceC(){
        $announces = $this->getAnnounces();
        $s=array();
        foreach($announces as $a){
            if($this->getC($a["id_user"])==0){
                array_push($s,$a);
            }
        }
        return $s;
    }
    public function getAnnounceT(){
        $announces = $this->getAnnounces();
        $s=array();
        foreach($announces as $a){
            if($this->getC($a["id_user"])==1){
                array_push($s,$a);
            }
        }
        return $s;
    }
    public function getAnnounceWilaya($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM annonce WHERE depart=:v OR arrive=:v");
            $stmt->bindValue( ":v", $id, PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
    public function trierDate(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM annonce ORDER BY date");
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        } 
    }
    public function annoncesArchiv(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM archiveannonce");
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        } 
    }
    public function validerAnnonce($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE annonce SET valide=:valide WHERE id=:id");
            $stmt->bindValue( ":valide", 1, PDO::PARAM_STR);
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            return 0;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
    public function deleteAnnonce($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("DELETE FROM annonce WHERE id =:id");
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            return 0;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
}
?>