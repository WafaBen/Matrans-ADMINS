<?php
require('./components.php');
require("../controllers/usersController.php");
$u = new usersVue();
$u->displayPage();
class usersVue{
    private $c;
    private $comp;
    private $values;
    function __construct(){
        $this->comp = new component();
        $this->c = new usersController();
        $this->values = $this->c->getUsers();
            
            
    }
    public function displayPage(){
        ?>
        <?php
            $v = $this->c->trier();
        ?>
        <?php
            $this->c->banir();
        ?>
        <?php
            $f = $this->c->filter();
        ?>
        <html lang="en">
        <head>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'  />
            <title>Accueil</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="../icons/all.min.css" />
            <link rel="stylesheet" href="../icons/fontawesome.min.css" />
            <link rel="stylesheet" href="../CSS/style.css" />
        </head>
        <body>
        <?php
            echo $this->comp->getNavBar();
        ?>
        <div class="container">
            <div class="row mt-2 col-12">
            <form class="form-inline " method="post" >
                <div class="form-group ">
                    <select name="triVal" id="inputState" class="form-control">
                        <option selected>-Critère-</option> 
                        <option value="nom">Nom</option>
                        <option value="prenom">Prenom</option>
                        <option value="id">id</option>
                    </select>
                </div>
                <button name="trier" type="submit" class="btn btn-primary mx-1">Trier</button>
            </form>
            <form class="form-inline" method="post">
                    <div class="form-group ">
                        <select name="wil" id="inputState" class="form-control">
                            <option selected>-Wilaya-</option> 
                            <option value="1">Adrar</option>
                            <option value="2">Chlef</option>
                            <option value="3">Laghouat</option>
                            <option value="9">Blida</option>
                            <option value="16">Alger</option>
                            <option value="26">Médea</option>
                        </select>
                    </div>
                    <button name="filtrer" type="submit" class="btn btn-primary  ml-1">Filtrer</button>
            </form>
                
            </div>
            
        </div>
        
        <h5 class="text-center mt-3">La liste des utilisateurs</h5>
        <div class="container ">
        <?php
            // if(isset($_POST["filtrer"]))$this->comp->generateTable(["id","nom","prenom","password","adresse","email","phone","valide"],$f);
            
        ?>
        <?php
            if(isset($_POST["trier"]))$this->comp->generateTable(["id","nom","prenom","adresse","email","phone"],$v);
            else {
                if(isset($_POST["filtrer"]))$this->comp->generateTable(["id","nom","prenom","adresse","email","phone"],$f);
                else{
                    $this->comp->generateTable(["id","nom","prenom","adresse","email","phone"],$this->values);
                }
            }
        ?>
        <?php
            
        ?>
        </div>
        <?php
            if(isset($_POST["banir"])){
            echo '<script type="text/JavaScript"> 
            alert("utilisateur banis avec succès");
            </script>';
            }
        ?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </body>
        </html>
        <?php
    }
}
?>