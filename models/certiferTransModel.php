<?php
class certiferTransModel{
    public function getNVT(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT id,nom,prenom,adresse,email,phone,valide,valide_d FROM users FULL JOIN demande ON id=id_user WHERE valide_d !=:v;");
            $stmt->bindValue( ":v", -1, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function validate($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE demande SET valide_d=:valide WHERE id_user=:id");
            $stmt->bindValue( ":valide", 1, PDO::PARAM_STR);
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            return 0;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }

    public function certify($id){
        $this->delete_demande($id);
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE users SET certifier=:c WHERE id=:id");
            $stmt->bindValue( ":c", 1, PDO::PARAM_STR);
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            return 0;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
    public function delete_demande($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("DELETE FROM demande WHERE id_user =:id");
            $stmt->bindValue( ":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            return 0;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
    public function refuse($id){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE demande SET valide_d=:valide WHERE id_user=:id");
            $stmt->bindValue( ":valide", -1, PDO::PARAM_STR);
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