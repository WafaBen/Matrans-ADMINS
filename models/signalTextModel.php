<?php 
class signalTextModel{
    public function getText($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT texte FROM signalement WHERE id_s=:idS;");
            $stmt->bindParam( ":idS", $id, PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>