<?php 
require('./components.php');
require('../controllers/gestionTarifController.php');
$v = new gestionTarifVue();
$v->displayPage();
class gestionTarifVue{
    private $c;
    function __construct(){
        $this->c = new gestionTarifController();
    }
    public function displayPage(){
        $wilayas = $this->c->getWilayas();
        $this->c->addPourcentage();
        $this->c->suppPourcentage();
        $this->c->addTarif();
        $this->c->suppTarif();
    ?>
    <html lang="en">
        <head>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'  />
            <title>Gestion de la présentation</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="../CSS/style.css" />
        </head>
        <header>
        <?php
            $c = new component();
            echo $c->getNavBar();
        ?>
        </header>
        <body>
            <h5 class="text-center mt-5">Gestion des tarifs</h5>
            <div class="mt-5 d-flex justify-content-center">
                <div class="col-5  rounded border border-primary">
                <h6 class="text-center mt-3">Ajouter un pourcentage pour un intervalle de prix</h6>
                <form class="mt-3" method="post">
                    <div class="row">
                        <div class="col">
                            <input name="min" type="text" class="form-control" placeholder="prix minimum">
                        </div>
                        <div class="col">
                            <input name="max" type="text" class="form-control" placeholder="prix maximum">
                        </div>
                        <div class="col">
                            <input name="pourcentage" type="text" class="form-control" placeholder="pourcentage">
                        </div>
                        <div class="col">
                            <input type="submit" name="ajouter" class="btn btn-primary form-control" value="Ajouter">
                        </div>
                    </div>
                </form>
                <?php $this->getTablePourcentage(); ?>
                </div>  
            </div>
            <div class="mt-5 d-flex justify-content-center">
                <div class="col-5  rounded border border-primary">
                <h6 class="text-center mt-3">Ajouter le prix d'un trajet</h6>
                <form class="mt-3" method="post">
                    <div class="row">
                    <div class="form-group col">
                        <select name="wilayaA" class="form-control">
                            <option selected>Choisir</option>
                            <?php foreach($wilayas as $w){
                                ?><option value="<?php echo $w["id"] ?>"><?php echo $w["name"]; ?></option><?php
                            } ?>
                            
                        </select>
                    </div>
                    <div class="form-group col">
                        <select name="wilayaB" class="form-control">
                            <option selected>Choisir</option>
                            <?php foreach($wilayas as $w){
                                ?><option value="<?php echo $w["id"] ?>"><?php echo $w["name"]; ?></option><?php
                            } ?>
                            
                        </select>
                    </div>
                    <div class="col">
                        <input name="prix" type="text" class="form-control" placeholder="Le prix">
                    </div>
                        <div class="col">
                            <input type="submit" name="ajouterT" class="btn btn-primary form-control" value="Ajouter">
                        </div>
                    </div>
                </form>
                <?php $this->tableTarif(); ?>
                </div>  
            </div>
        </body>
    </html>
    <?php
    }
    private function getTablePourcentage(){
        $data = $this->c->getPourcentages();
        ?>
        <div class="mt-3 row px-1">
        <table class="col-12 table table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
            <th class="text-center">Prix minimal</th>
            <th class="text-center">Prix maximal</th>
            <th class="text-center">Pourcentage</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($data as $v){
                ?>
                    <tr>
                    <td class="text-center"><?php echo $v["min"] ?></td>
                    <td class="text-center"><?php echo $v["max"] ?></td>
                    <td class="text-center"><?php echo $v["pourcentage"] ?> %</td>
                    <td>
                        <form class="form-inline" method="post">
                            <div class="form-group ">
                                <input  name="id" type="hidden" value="<?php echo $v["id"] ?>" />
                            </div>
                            <div class="form-group ">
                                <input  name="supprimer" type="submit" class="form-control btn btn-danger" id="" value="Supprimer" />
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
    private function tableTarif(){
        $data = $this->c->getTarifs();
        ?>
        <div class="mt-3 row px-1">
        <table class="col-12 table table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
            <th class="text-center">Wilaya A</th>
            <th class="text-center">Wilaya B</th>
            <th class="text-center">Le tarif</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($data as $v){
                ?>
                    <tr>
                    <td class="text-center"><?php echo $this->c->getWilaya($v["id_d"])["name"];  ?></td>
                    <td class="text-center"><?php echo $this->c->getWilaya($v["id_a"])["name"]; ?></td>
                    <td class="text-center"><?php echo $v["tarif"] ?> DA</td>
                    <td>
                        <form class="form-inline" method="post">
                            <div class="form-group ">
                                <input  name="idT" type="hidden" value="<?php echo $v["idTarif"] ?>" />
                            </div>
                            <div class="form-group ">
                                <input  name="supprimerT" type="submit" class="form-control btn btn-danger" value="Supprimer" />
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
?>