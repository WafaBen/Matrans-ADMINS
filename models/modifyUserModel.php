<?php
class modifyModalUser{
    public function getUser($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT FROM users WHERE id =:id");
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchObject();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        } 
    }
}
?>