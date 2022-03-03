<?php
require('./components.php');
$vue = new contenuVue();
$vue->displayPage();
class contenuVue{
    public function displayPage(){
        ?>
        <html lang="en">
        <head>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'  />
            <title>Accueil</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="../CSS/style.css" />
        </head>
        <body>
        <?php
            $c = new component();
            echo $c->getNavBar();
        ?>
        <div class="container mt-5">
            <div class= "row">
                <div class="col mr-2 text-white">
                        <img class="card-img" src="../assets/presentation.jpg" alt="Card image">
                        <div class="card-img-overlay">
                            <a href="./gestionPresentationVue.php"><h5 class="card-title">Gestion de la page presentation</h5></a>
                        </div>
                    </div>
                    <div class=" col mr-2 text-white">
                        <img class="card-img" src="../assets/announces.jpg" alt="Card image">
                        <div class="card-img-overlay">
                            <a href="./gestionAccueilVue.php"><h5 class="card-title">Gestion de la page Accueil</h5></a>
                        </div>
                    </div>
                    <div class=" col mr-2  text-white">
                        <img class="card-img" src="../assets/users.jpg" alt="Card image">
                        <div class="card-img-overlay">
                            <a href="./gestionContactVue.php"><h5 class="card-title">Gestion de la page contact</h5></a>
                        </div>
                    </div>
                    <div class="  col mr-2 text-white">
                        <img class="card-img" src="../assets/users.jpg" alt="Card image">
                        <div class="card-img-overlay">
                            <a href="./gestionTarifVue.php"><h5 class="card-title">Gestion des tarifs</h5></a>
                        </div>
                    </div>
            </div>
            
        </div>
    </body>
    </html>
        <?php
    }
}
?>