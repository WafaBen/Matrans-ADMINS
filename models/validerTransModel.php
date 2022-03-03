<?php
class validerTransModel{
    public function getNVT(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT id,nom,prenom,adresse,email,phone FROM users WHERE valide=:v and transporteur=:d;");
            $stmt->bindValue( ":v", 0, PDO::PARAM_STR);
            $stmt->bindValue( ":d", 1, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function valider($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE users SET valide=:valide WHERE id=:id");
            $stmt->bindValue( ":valide", 1, PDO::PARAM_STR);
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