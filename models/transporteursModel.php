<?php
class transporteursModel{
    public function gettrans(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM users WHERE transporteur=:t ");
            $stmt->bindValue( ":t", 1, PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function banir($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE users SET banned=:banned WHERE id=:id");
            $stmt->bindValue( ":banned", 1, PDO::PARAM_STR);
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            return 0;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
    public function trierNom(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM users WHERE transporteur=:t ORDER BY nom");
            $stmt->bindValue( ":t", 1, PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
          
    }
    public function trierPrenom(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM users WHERE transporteur=:t ORDER BY prenom");
            $stmt->bindValue( ":t", 1, PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
          
    }
    public function trierId(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM users WHERE transporteur=:t ORDER BY id");
            $stmt->bindValue( ":t", 1, PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
          
    }
    public function filtrerWilaya($w){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM users WHERE adresse=:w AND transporteur=:t");
            $stmt->bindValue( ":t", 1, PDO::PARAM_STR);
            $stmt->bindValue( ":w", $w, PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getNbTransNonCert(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM demande");
            $stmt->execute();
            $result = $stmt->fetchAll();
            return count($result);
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getNbTransNonValid(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM users WHERE transporteur=:t and valide=:v");
            $stmt->bindValue( ":t", 1, PDO::PARAM_STR);
            $stmt->bindValue( ":v", 0, PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return count($result);
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>