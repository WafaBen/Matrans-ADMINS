<?php
class modifyNewModel{
    public function getNew($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM news WHERE id =:id");
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        } 
    }
    public function modify($t,$d,$i,$id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE news SET titre=:titre, description=:d,image=:i WHERE id=:id");
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->bindValue( ":d", $d, PDO::PARAM_STR);
            $stmt->bindValue( ":titre", $t, PDO::PARAM_STR);
            $stmt->bindValue( ":i", $i, PDO::PARAM_STR);
            $stmt->execute();
            
        }
        catch(PDOException $e) {
            return 1;
        } 
    }
}
?>