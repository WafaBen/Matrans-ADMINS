<?php
require('./components.php');
require('../controllers/gestionPresentationController.php');
$vue = new gestionPresentationVue();
$vue->displayPage();
class gestionPresentationVue{
    private $c;
    function __construct(){
        $this->c = new gestionPresentationController();
    }
    public function displayPage(){
        ?>
        <?php
            $this->c->setDescription();
        ?>
        <?php
            $this->c->setVideo();
        ?>
        <html lang="en">
        <head>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'  />
            <title>Gestion de la présentation</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="../CSS/style.css" />
        </head>
        <body>
        <?php
            $c = new component();
            echo $c->getNavBar();
        ?>
        <h5 class="text-center mt-5">Gestion du contenu de la page présentation</h5>
            
        <div class="container mt-5">
        <div class="d-flex justify-content-center">
        <form class="form-inline col-12" method="post">
            <div class="form-group col-3 mb-2 ">
                <input type="textarea" readonly class="form-control-plaintext"  value="Le texte de la description"/>
            </div>
            <div class="form-group col-5 mx-sm-3 mb-2">
                <input type="textarea" name="desc" rows="4"></input>
            </div>
            <button type="submit" name="description" class="col-2 btn btn-primary mb-2">Sauvegarder</button>
        </form>
       </div> 
       <div class="mt-3 mb-3">
       <iframe width="500" height="200" src="<?php echo $this->c->getVideo()[0]["video"]; ?>"></iframe>
    </div>                
        
    <div class="d-flex justify-content-center">
        <form class="form-inline col-12" method="post">
            <div class="form-group col-3 mb-2">
                <input type="text" readonly class="form-control-plaintext"  value="La vidéo">
            </div>
            <div class="form-group mx-sm-3 mb-2 col-5">
                <div class="custom-file">
                    <input type="text" name="file" >
                </div>
            </div>
            <button type="submit" name="video" class="col-2 btn btn-primary mb-2">Sauvegarder</button>
        </form>
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