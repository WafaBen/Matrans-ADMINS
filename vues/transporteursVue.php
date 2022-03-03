<?php
require('./components.php');
require('../controllers/transporteursController.php');
$t = new transporteursVue();
$t->displpayPage();
class transporteursVue{
    private $c;
    private $comp;
    private $values;
    function __construct(){
        $this->c = new transporteursController();
        $this->comp = new component();
        $this->values  = $this->c->getTrans();
    }
    public function displpayPage(){
        
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
            <div class="row col-12">
                <button type="button" class="btn btn-warning  col-3 mr-2 ">
                    Les comptes a valider <a href="./validerTransVue.php" class="badge badge-danger"><?php echo $this->c->getNbTransNonValid(); ?></a>
                </button>
                <button type="button" class="btn btn-warning  col-3">
                    Demandes de certification <a href="./certiferTransVue.php" class="badge badge-danger"><?php echo $this->c->getNbTransNonCert(); ?></a>
                </button>
            </div>
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
        
        <h5 class="text-center mt-3">La liste des transporteurs</h5>
        <div class="container ">
        <?php
            // if(isset($_POST["filtrer"]))$this->comp->generateTable(["id","nom","prenom","password","adresse","email","phone","valide"],$f);
            
        ?>
        <?php
            if(isset($_POST["trier"]))$this->generateTable(["id","nom","prenom","adresse","email","phone","certifié"],$v);
            else {
                if(isset($_POST["filtrer"]))$this->generateTable(["id","nom","prenom","adresse","email","phone","certifié"],$f);
                else{
                    $this->generateTable(["id","nom","prenom","adresse","email","phone","certifié"],$this->values);
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
    public function generateTable($colNames,$values){
        ?>
        <div class="row px-1">
        <table class="col-12 table table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
            <?php
            if(count($values)==0){
                ?>
                    <div class="alert alert-warning" role="alert">
                        La liste est vide
                    </div>
                <?php
            }
            else{
            foreach($colNames as $cn){
            ?>
                <th scope="col"><?php echo $cn ?></th>
            <?php
            }
            ?>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($values as $v){
                ?>
                    <tr>
                    <?php
                    for($i=0;$i<count($colNames)-1;$i++){
                    ?>
                        <td><?php echo $v[$colNames[$i]]; ?></td>
                    <?php
                    }
                    ?>
                    <td><?php if($v["valide"] == 1)echo 'certifié'; 
                              else echo 'Non certifié';?></td>
                    <td>
                        <form class="form-inline" method="post">
                            <div class="form-group ">
                                <input  name="id" type="hidden" value="<?php echo $v["id"] ?>" />
                            </div>
                            <div class="form-group ">
                                <input  name="banir" type="submit" class="form-control btn btn-success" id="" value="banir" />
                            </div>
                        </form>
                    </td>
                    </tr>
                <?php
                }
            ?>
        </tbody>
        </table>
        </div>
        <?php
    }
    }
}
?>