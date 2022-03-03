<?php
class gestionPresentationModel{
    public function getDescription(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT description FROM presentation");
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getVideo(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT video FROM presentation");
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function setDescription($d){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE presentation SET description=:d WHERE id=:id");
            $stmt->bindValue( ":id", 1, PDO::PARAM_STR);
            $stmt->bindValue( ":d", $d, PDO::PARAM_STR);
            $stmt->execute();
            
        }
        catch(PDOException $e) {
            return 1;
        } 
    }
    public function setVideo($v){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE presentation SET video=:v WHERE id=:id");
            $stmt->bindValue( ":id", 1, PDO::PARAM_STR);
            $stmt->bindValue( ":v", $v, PDO::PARAM_STR);
            $stmt->execute();
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
}
?>