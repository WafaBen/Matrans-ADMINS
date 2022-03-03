<?php
class gestionContactsModel{
    public function getContacts(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM contacts");
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function setContact($id,$info,$link){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE contacts SET info=:i, link=:l WHERE id=:id");
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->bindValue( ":l", $link, PDO::PARAM_STR);
            $stmt->bindValue( ":i", $info, PDO::PARAM_STR);
            $stmt->execute();
        }
        catch(PDOException $e) {
            return 1;
        } 
    }
    public function addContact($icon,$info,$link){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request = "INSERT INTO contacts (icon,info,link)
                        VALUES  ('$icon','$info','$link')";
            $query = $conn->prepare($request);
            $query->execute();
           
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function supprimer($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("DELETE FROM contacts WHERE id =:id");
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