<?php
require_once("../controllers/newsController.php");
require('./components.php');
require('./componentNews.php');
$v = new newsVue();
$v->displayPage();
class newsVue{
    private $comp;
    private $c;
    function __construct(){
        $this->comp = new component();
        $this->c = new newsController();
    }
    public function displayPage(){
        ?>
        <?php
            $this->c->addNew();
        ?>
        <?php
            $this->c->deleteNew();
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
            echo $this->comp->getNavBar();
        ?>
        <div class="container">
            <div class=" py-2">
                <button type="button" class="btn btn-warning col-4" data-toggle="modal" data-target="#Modal">
                    Ajouter une new
                </button>
            </div>
        </div>
        <h5 class="text-center mt-3">La liste des news</h5>
        <div class="container ">
        <?php
            
            $values = $this->c->getNews();
            $this->generateTable(["titre","date"],$values);
        ?>
        </div>
        <?php
            $this->modal();
        ?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <?php
             if(isset($_POST["ajouter"])){
                echo '<script type="text/JavaScript"> 
                alert("la new a été ajouté avec succès");
                </script>';
            }
            ?>
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
                        <form class="row" method="post">
                            <input  name="id" type="hidden" value="<?php echo $v["id"] ?>" />
                            <div class="col-6 mx-0">
                                <input  name="delete" type="submit" class="form-control btn btn-danger" id="" value="Supprimer" />
                            </div>
                            <div class="col-6 mx-0 ">
                                <a  name="modify" type="submit" class="form-control btn btn-warning" role="button"  href="../vues/modifyNewsVue.php?id=<?php echo $v["id"]; ?>" >Modifier</a>
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
    public function modal(){
        ?>
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Ajouter new</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Le titre</label>
                        <input name="titre" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">La description</label>
                        <textarea name="desc" class="form-control" id="message-text"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">L'image</label>
                        <input name="image" type="file" class="form-control" >
                    </div>
                    <button name="ajouter" type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>