<?php
require('./components.php');
require('../controllers/gestionAccueilController.php');
$vue = new gestionAccueilVue();
$vue->displayPage();
class gestionAccueilVue{
    private $c;
    function __construct(){
        $this->c = new gestionAccueilController();
    }
    public function displayPage(){
        $diapo = $this->c->getDiapo();
        $critere =$this->c->getCritere();
        ?>
        <?php
        $this->c->setImage();
        ?>
        <?php
        $this->c->setCritere();
        ?>
        <html lang="en">
            <head>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'  />
                <title>Gestion de l'Accueil</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <link rel="stylesheet" href="../CSS/style.css" />
            </head>
            <?php
            $c = new component();
            echo $c->getNavBar();
            ?>
            <body>  
                <h5 class="text-center mt-4">Gestion du contenu de la page d'accueil</h5>
                <p class="text-center mt-4">Selectionnez l'image que vous voulez changer et choisir en dessous la nouvelle</p>
                <div class="container mt-4">
                    <div id="carouselExampleControls" class="carousel slide" >
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img style="width:300px;height:300px;" class="d-block w-100" src="<?php echo '.'.$diapo[0]["image"];?>" alt="First slide">
                            <div class="row">
                                <form method="post" class="col-4 mx-auto">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?php echo $diapo[0]["id"]; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <input name="file" type="file" class="form-control" >
                                        <small  class="form-text text-muted">l'image</small>
                                    </div>
                                    <div class="form-group">
                                        <input name="link" type="text" class="form-control" value="<?php echo $diapo[0]["link"]; ?>" >
                                        <small  class="form-text text-muted">Le lien de la publicité</small>
                                    </div>
                                    <div class="form-group">
                                        <input name="change" type="submit" value="Sauvegarder" class="form-control btn btn-primary" >
                                    </div>
                                </form>
                            </div>
                            </div>
                            <?php for($i=1;$i<count($diapo);$i++){ ?>
                            <div class="carousel-item ">
                            <img style="width:200px;height:300px;" class="d-block w-100" src="<?php echo '.'.$diapo[$i]["image"];?>" alt="First slide">
                            <div class="row">
                                <form method="post" class="col-4 mx-auto">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?php echo $diapo[$i]["id"]; ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <input name="file" type="file" class="form-control" >
                                        <small  class="form-text text-muted">l'image</small>
                                    </div>
                                    <div class="form-group">
                                        <input name="link" type="text" class="form-control" value="<?php echo $diapo[$i]["link"]; ?>" >
                                        <small  class="form-text text-muted">Le lien de la publicité</small>
                                    </div>
                                    <div class="form-group">
                                        <input name="change" type="submit" value="Sauvegarder" class="form-control btn btn-primary" >
                                    </div>
                                </form>
                            </div>
                            </div> <?php } ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <p class="text-center mt-4">Selectionnez le critère de sélection des 8 annonces affichées dans la page d'accueil</p>
                    <p class="text-center">Le critère courrant c'est  :<?php echo  $critere[0]["nom"]; ?> </p>

                    <div class="row">
                                <form method="post" class="col-4 mx-auto">
                                    <div class="form-group">
                                        <select name="choix" class="form-control">
                                            <?php foreach($critere as $cr){ ?>
                                            <option value="<?php echo $cr["id"] ?>"><?php echo $cr["nom"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input name="critere" type="submit" value="Sauvegarder" class="form-control btn btn-primary" >
                                    </div>
                                </form>
                        </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            
            </body>
        </html>
    <?php
    }
}
?>