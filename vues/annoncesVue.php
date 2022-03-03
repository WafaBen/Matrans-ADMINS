<?php
require('./components.php');
require('../controllers/announcesController.php');
$a = new announcesVue();
$a->displayPage();
class announcesVue{
    public function displayPage(){
        ?>
        <?php
            $c = new announcesController();
            $v = $c->filtrer();
        ?>
        <?php
            $t = $c->trierDate();
        ?>
        <?php
            $c->validerAnnonce();
            ?>
            <?php
            $c->deleteAnnonce();
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
            $comp = new component();
            echo $comp->getNavBar();
        ?>
        <div class="container">
            <div class="row mt-2 ">
                <div class="mt-1 mr-4 ml-4">
                    <a href="#tableArchiv">Annonces archivées</a>
                </div>
                <form class="form-inline ml-5" method="post" >
                    <div class="form-group ">
                        <select name="filtre" id="inputState" class="form-control">
                            <option selected>-Critère-</option> 
                            <option value="v">Valide</option>
                            <option value="nV">Non valide</option>
                            <option value="c">Par un client</option>
                            <option value="t">Par un transporteur</option>
                            <option value="1">Adrar</option>
                            <option value="2">Chlef</option>
                            <option value="3">Laghouat</option>
                            <option value="9">Blida</option>
                            <option value="16">Alger</option>
                            <option value="26">Médea</option>
                        </select>
                    </div>
                    <button name="filtrer" type="submit" class="btn btn-primary mx-1">Filtrer</button>
                </form>
                <form class="form-inline" method="post">
                        <div class="form-group ">
                            <select name="tri" id="inputState" class="form-control">
                                <option selected>Date</option>
                            </select>
                        </div>
                        <button name="trier" type="submit" class="btn btn-primary  ml-1">Trier</button>
                </form>
                
                
            </div>
            
        </div>
        <h5 class="text-center mt-3 mb-4">La liste des annonces</h5>
        <div class="container">
        <?php
            $co = new announcesController();
            $values = $co->getAnnounces();
            if(isset($_POST["filtrer"])){
                $this->generateTable($v,["depart","arrive","titre","description","type du transport","le poids","le volume","le moyen du transport","la date"]);
            }
            else{
                if(isset($_POST["trier"])){
                    $this->generateTable($t,["depart","arrive","titre","description","type du transport","le poids","le volume","le moyen du transport","la date"]);
                }
                else{
                    $this->generateTable($values,["depart","arrive","titre","description","type du transport","le poids","le volume","le moyen du transport","la date"]);
                }
            } 
        ?>
        </div>
        <h5 class="text-center mt-3 mb-4">La liste des annonces archivées</h5>
        <div class="container">
            <?php
            $this->annoncesArchivTable();
            ?>
        </div>
    </body>
    </html>
    <?php
    }
    private function generateTable($values,$colNames){
            $c = new announcesController();
            ?>
            
            <div class="row px-1">
            <table class="col-12 table table-hover table-bordered">
            <thead class="thead-dark">
                <tr >
                <?php
                foreach($colNames as $cn){
                ?>
                    <th class="text-center" scope="col"><?php echo $cn ?></th>
                <?php
                }
                ?>
                <th class="text-center">
                    Actions
                </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($values as $v){
                    ?>
                        <tr>
                        <td class="text-center">
                            <?php echo $c->getWilaya($v["depart"])[0]["name"];  ?>
                        </td>
                        <td>
                            <?php echo $c->getWilaya($v["arrive"])[0]["name"]; ?>
                        </td class="text-center" >
                        <td>
                            <?php echo $v["titre"]; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $v["description"]; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $c->getMoy($v["moyT"])[0]["nom"]; ?>
                        </td>
                        <td class="text-center">
                            <?php echo 'min:'.$c->getPoids($v["fpoids"])[0]["min"].'  max:'.$c->getPoids($v["fpoids"])[0]["max"]; ?>
                        </td>
                        <td>
                            <?php echo 'min:'.$c->getVolume($v["fvolume"])[0]["min"].'  max:'.$c->getVolume($v["fvolume"])[0]["max"]; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $c->getTypeT($v["typeT"])[0]["type"]; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $v["date"]; ?>
                        </td>
                        <td>
                            <form class="form-inline" method="post">
                                <input  name="id" type="hidden" value="<?php echo $v["id"] ?>" />
                            <?php
                                if($v["valide"]==1){
                                    ?>
                                    <p class="text-center">validée</p>
                                    <?php
                                }
                                else{
                                    ?>
                                        <div class="form-group mr-2">
                                            <input  name="valide" type="submit" class="form-control btn btn-success" value="Valider" />
                                        </div>
                                        <div class="form-group mr-2">
                                            <input  name="annuler" type="submit" class="form-control btn btn-success"  value="annuler" />
                                        </div>
                                    <?php
                                }
                            ?>
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
    private function annoncesArchivTable(){
        $c = new announcesController();
        $aR = $c->annoncesArchiv();
        $col = ["depart","arrive","titre","description","type du transport","le poids","le volume","le moyen du transport","la date"];
        ?>
        <div class="row px-1" id="tableArchiv">
            <?php if(count($aR)==0){
                ?>
                    <div class="alert alert-warning" role="alert">
                        Y a aucune annonces archivées
                    </div>
                <?php
            }else{ ?>
        <table class="col-12 table table-hover table-bordered">
        <thead class="thead-dark">
            <tr >
            <?php
            foreach($col as $cn){
            ?>
                <th class="text-center" scope="col"><?php echo $cn ?></th>
            <?php
            }
            ?>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($aR as $v){
                ?>
                    <tr>
                    <td class="text-center">
                        <?php echo $c->getWilaya($v["depart"])[0]["name"];  ?>
                    </td>
                    <td>
                        <?php echo $c->getWilaya($v["arrive"])[0]["name"]; ?>
                    </td class="text-center" >
                    <td>
                        <?php echo $v["titre"]; ?>
                    </td>
                    <td class="text-center">
                        <?php echo $v["description"]; ?>
                    </td>
                    <td class="text-center">
                        <?php echo $c->getMoy($v["moyT"])[0]["nom"]; ?>
                    </td>
                    <td class="text-center">
                        <?php echo 'min:'.$c->getPoids($v["fpoids"])[0]["min"].'  max:'.$c->getPoids($v["fpoids"])[0]["max"]; ?>
                    </td>
                    <td>
                        <?php echo 'min:'.$c->getVolume($v["fvolume"])[0]["min"].'  max:'.$c->getVolume($v["fvolume"])[0]["max"]; ?>
                    </td>
                    <td class="text-center">
                        <?php echo $c->getTypeT($v["typeT"])[0]["type"]; ?>
                    </td>
                    <td class="text-center">
                        <?php echo $v["date"]; ?>
                    </td>
                    </tr>
                <?php
                }
            ?>
        </tbody>
        </table>
        <?php } ?>
        </div>
        <?php
    
    }
}
?>