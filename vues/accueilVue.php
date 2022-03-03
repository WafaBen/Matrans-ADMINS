<?php
require('./components.php');
$v = new accueilVue();
$v->afficherAccueil();
class accueilVue{
    public function afficherAccueil(){
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
        <div class="container">
            <div class= " row ">
                <div class=" col-12 col-sm-3 mr-1 card bg-dark text-white">
                    <img class="card-img" src="../assets/users.jpg" alt="Card image">
                    <div class="card-img-overlay">
                        <a href="./utilisateursVue.php"><h5 class="card-title">Gestion des utilisateurs</h5></a>
                    </div>
                </div>
                <div class=" col-12 col-sm-3 mr-1 card bg-dark text-white">
                    <img class="card-img" src="../assets/announces.jpg" alt="Card image">
                    <div class="card-img-overlay">
                        <a href="./annoncesVue.php"><h5 class="card-title">Gestion des annonces</h5></a>
                    </div>
                </div>
                <div class=" col-12 col-sm-3  card bg-dark text-white">
                    <img class="card-img" src="../assets/users.jpg" alt="Card image">
                    <div class="card-img-overlay">
                        <a href="./signalsVue.php"><h5 class="card-title">Gestion des signalements</h5></a>
                    </div>
                </div>
            </div>
            <div class="row mt-1">
                <div class=" col-12 col-sm-3 mr-1 card bg-dark text-white">
                    <img class="card-img" src="../assets/news.jpg" alt="Card image">
                    <div class="card-img-overlay">
                        <a href="./newsVue.php"><h5 class="card-title">Gestion des news</h5></a>
                    </div>
                </div>
                <div class=" col-12 col-sm-3 mr-1 card bg-dark text-white">
                    <img class="card-img" src="../assets/contenu.jpg" alt="Card image">
                    <div class="card-img-overlay">
                        <a href="./contenuVue.php"><h5 class="card-title">Gestion du contenu</h5></a>
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