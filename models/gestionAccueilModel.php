<?php
class gestionAccueilModel{
    public function getDiapo(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM diaporama");
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function setImage($id,$img,$link){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE diaporama SET link=:i, image=:l WHERE id=:id");
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->bindValue( ":i", $link, PDO::PARAM_STR);
            $stmt->bindValue( ":l", $img, PDO::PARAM_STR);
            $stmt->execute();
        }
        catch(PDOException $e) {
            return 1;
        } 
    }
    public function getCriteres(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM critere ORDER BY selected DESC");
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function setCritere($id){
        $this->resetCritere();
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE critere SET selected=:s WHERE id=:id");
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->bindValue( ":s", 1, PDO::PARAM_STR);
            $stmt->execute();
        }
        catch(PDOException $e) {
            return 1;
        } 
    }
    private function resetCritere(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE critere SET selected=:s ");
            $stmt->bindValue( ":s", 0, PDO::PARAM_STR);
            $stmt->execute();
        }
        catch(PDOException $e) {
            return 1;
        }
    }
}
?>