<?php
require('./components.php');
require('../controllers/validerTransController.php');
$v = new validerTransVue();
$v->displayPage();
class validerTransVue{
    private $c;
    function __construct(){
        $this->c = new validertransController();
    }
    public function displayPage(){
        ?>
        <?php
            $this->c->valider();
        ?>
        <html lang="en">
        <head>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'  />
            <title>Gestion des utilisateurs</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="../icons/all.min.css" />
            <link rel="stylesheet" href="../icons/fontawesome.min.css" />
            <link rel="stylesheet" href="../CSS/style.css" />
        </head>
        <body>
        <?php
            $comp = new component();
            echo $comp->getNavBar();
        ?>
        <div class="container">
            <h5 class="text-center mt-3">La liste des transporteurs qui ont demandé une certification</h5>
            <div class="container mt-3">
            <?php
            $result = $this->c->getNVT(); 
            $this->generateTable(["id","nom","prenom","adresse","email","phone"],$result);
            ?>
        </div>
        
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
                    for($i=0;$i<count($colNames);$i++){
                    ?>
                        <td><?php echo $v[$colNames[$i]]; ?></td>
                    <?php
                    }
                    ?>
                    <td>
                        <form class="form-inline" method="post">
                            <div class="form-group ">
                                <input  name="id" type="hidden" value="<?php echo $v["id"] ?>" />
                            </div>
                            <div class="form-group mr-2">
                                <input  name="valider" type="submit" class="form-control btn btn-success" id="" value="Valider" />
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