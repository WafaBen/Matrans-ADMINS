<?php
require('./components.php');
require('../controllers/signalsController.php');
$s = new signalsVue();$s->displayPage();
class signalsVue{
    public function displayPage(){
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
        <header>
        <?php
            $comp = new component();
            echo $comp->getNavBar();
        ?>
        </header>
        <body>
        <div class="container mt-5">
            <h5 class="text-center">Gestion des signalements</h5>
            <?php $this->sigTable(); ?>
        </div>

        </body>
    </html>
        <?php
    }
    private function sigTable(){
        $c = new signalsController();
        $values = $c->getSignals();
        ?>
            
        <div class="row px-1">
        <table class="col-12 table table-hover table-bordered">
        <thead class="thead-dark">
            <tr >
                <th class="text-center">Identifiant</th>
                <th class="text-center">Nom de l'utilisateur</th>
                <th class="text-center">Type</th>
                <th class="text-center">L'annonce</th>
                <th class="text-center">Identifiant de l'utilisateur en cause</th>
                <th class="text-center">Nom de l'utilisateur en cause</th>
                <th class="text-center">Le texte du signalement</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($values as $v){
                ?>
                    <tr>
                        <td class="text-center">
                            <?php echo $v["id_d"]  ?>
                        </td>
                        <td>
                            <a href="http://localhost/matrans-site/vues/profileVue.php?id=<?php echo $v["id_d"] ?>" target="_blank"><?php echo $v["nomd"].' '.$v["prenomd"]; ?></a>
                        </td class="text-center" >
                        <td class="text-center">
                            <?php
                            if($v["typed"]==1) echo 'transporteur';
                            else echo 'client'; ?>
                        </td>
                        <td class="text-center">
                            <a href="http://localhost/matrans-site/vues/detailsVue.php?id=<?php echo $v["id_a"] ?>" target="_blank"><?php echo $v["titre"]; ?></a>
                        </td>
                        <td class="text-center">
                            <?php echo $v["id_r"]; ?>
                        </td>
                        <td class="text-center">
                            <a href="http://localhost/matrans-site/vues/profileVue.php?id=<?php echo $v["id_r"] ?>" target="_blank"><?php echo $v["nomr"].' '.$v["prenomr"]; ?></a>
                        </td>
                        <td class="text-center">
                            <a href='./signalText.php?id=<?php echo $v["id_s"] ?>'>Lien vers le texte</a>
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