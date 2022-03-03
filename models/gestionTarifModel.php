<?php
class gestionTarifModel{
    public function getPourcentages(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT id,min,max,pourcentage FROM pourcentage");
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
    public function addPourcentage($min,$max,$p){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request = "INSERT INTO pourcentage (min,max,pourcentage)
                        VALUES  ('$min','$max','$p')";
            $query = $conn->prepare($request);
            $query->execute();
           
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function suppPourcentage($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("DELETE FROM pourcentage WHERE id =:id");
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            return 0;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
    public function getWilayas(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT id,name FROM wilayas");
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
    public function getTarifs(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tarif");
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
    public function getWilaya($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT name FROM wilayas WHERE id=:id");
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
    public function addTarif($id_a,$id_d,$t){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request = "INSERT INTO tarif (id_a,id_d,tarif)
                        VALUES  ('$id_a','$id_d','$t')";
            $query = $conn->prepare($request);
            $query->execute();
           
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function suppTarif($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("DELETE FROM tarif WHERE idTarif =:id");
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