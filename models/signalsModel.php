<?php
class signalsModel{
    public function getSignals(){
        try{
            $servername="localhost";
            $username="root";
            $password="";
            $db="matrans";
            $conn= new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT A.nom AS nomd,A.prenom AS prenomd,A.transporteur AS typed,B.nom AS nomr,B.prenom AS prenomr,titre,id_s,id_d,id_r,id_a,texte FROM 
            signalement
            JOIN users A ON id_d=A.id
            JOIN users B ON id_r=B.id 
            JOIN annonce on id_a=annonce.id");
            $stmt->execute();
            $res = $stmt->fetchAll();
            return $res;
            
        }
        catch(PDOException $e) {
            return 1;
        }
    }
}
?>