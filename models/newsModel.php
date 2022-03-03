<?php
class newsModel{
    public function getNews(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM news");
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function addnew($t,$d,$i){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $d = date("Y/m/d");
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request = "INSERT INTO news (titre, description,image,date)
                        VALUES  ('$t','$d','$i','$d')";
            $query = $conn->prepare($request);
            $query->execute();
           
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function deleteNew($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("DELETE FROM news WHERE id =:id");
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