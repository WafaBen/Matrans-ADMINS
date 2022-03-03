<?php
require('./components.php');
    ?>
    <html lang="en">
    <head>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'  />
        <title>Accueil</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     </head>
    <body>
    <?php
        $c = new component();
        echo $c->getNavBar();
    ?>
    <div class="container">
        <div class= "row col-12 px-1 mt-4 ">
            <div class="col-sm-5 card  text-white">
                <img style="height:300px;" class="card-img" src="../assets/utilisateurs.jpg" alt="Card image">
                <div class="card-img-overlay">
                    <a href="./usersVue.php"><h5 class="card-title">Gestion des utilisateurs</h5></a>
                </div>
            </div>
            <div class="col-sm-5 card text-white">
                <img style="height:300px;" class="card-img" src="../assets/transporteurs.jpg" alt="Card image">
                <div class="card-img-overlay">
                    <a href="./transporteursVue.php"><h5 class="card-title">Gestion des transporteurs</h5></a>
                </div>
            </div>
        </div>
    </div>
</body>
    <?php
?>