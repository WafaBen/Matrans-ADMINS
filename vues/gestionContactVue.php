<?php
require('./components.php');
require('../controllers/gestionContactController.php');
$vue = new gestionContactVue();
$vue->displayPage();
class gestionContactVue{
    private $c;
    function __construct(){
        $this->c = new gestionContactController();
    }
    public function displayPage(){
        $contacts = $this->c->getContacts();
        ?>
        <?php
         $this->c->setContact();
        ?>
        <?php
        $this->c->addContact();
        ?>
        <?php
        $this->c->deleteContact();
        ?>
        <html lang="en">
            <head>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'  />
                <title>Gestion des Contacts</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <link rel="stylesheet" href="../CSS/style.css" />
            </head>
            <body>
            <?php
            $c = new component();
            echo $c->getNavBar();
            ?>
            <h5 class="text-center mt-3 mb-3">Gestion des contacts</h5>
                <div class="container">
                    <div class="row">
                        <?php
                        foreach($contacts as $c){
                        ?>
                        <div class="col">
                        <div class="card">
                        <div class="card-header">
                            <img style="width:80px;height:80px;" src="<?php echo $c["icon"] ?>" />
                        </div>
                        <div class="card-body">    
                        <form method="post">
                            <div class="form-group">
                                <input name="info" type="text" class="form-control" value="<?php echo $c["info"];  ?>" >
                                <small  class="form-text text-muted">Ce que apparait à l'utilisateur</small>
                            </div>
                            <div class="form-group">
                                <label >Le lien</label>
                                <input name="link" type="text" class="form-control" value="<?php echo $c["link"] ?>">
                            </div>
                            <div class="form-check">
                                <input name="id" type="hidden" value="<?php echo $c["id"];?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="sauv" class="btn btn-primary">Sauvegarder</button>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="supp" class="btn btn-primary">Supprimer</button>
                            </div>
                        </form>
                        </div> 
                        </div>
                        </div>         
                        <?php
                        }
                        ?>
                    </div>   
                </div> 
                <div class="container mt-4">
                <div class="card">
                    <h5 class="card-header">
                        Ajouter un nouveau contact
                    </h5>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <input name="file" type="file" class="form-control" >
                                <small  class="form-text text-muted">l'icone ou le logo</small>
                            </div>
                            <div class="form-group">
                                <input name="info" type="text" class="form-control" >
                                <small  class="form-text text-muted">Le texte qui apparait à l'utilisateur</small>
                            </div>
                            <div class="form-group">
                                <label >Le lien</label>
                                <input name="link" type="text" class="form-control">
                            </div>
                            <button type="submit" name="ajout" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
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