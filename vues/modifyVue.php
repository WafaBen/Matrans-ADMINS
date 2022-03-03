<?php
    $id =$_GET["id"];
    $v = new modifyVue();
    $v->displayPage($id);
?>
<?php
require("../controllers/modifyUserController.php");
class modifyVue{
    public function displayPage($id){
        $c = new modifyUserController();
        $data = $c->getUser($id);
        ?>
        <html lang="en">
        <head>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'  />
            <title>Accueil</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="../CSS/style.css" />
        </head>
        <body>
            <form class="col-3 mx-auto mt-2" method="post">
                <div class="form-group">
                    <input name="nom" type="text" class="form-control"  value="<?php $data->nom ?>">
                </div>
                <div class="form-group">
                    <input name="prenom" type="text" class="form-control"  value="<?php $data->prenom ?>">
                </div>
                <div class="form-group">
                    <input name="password" type="text" class="form-control"  value="<?php $data->password ?>">
                </div>
                <div class="form-group">
                    <input name="adresse" type="text" class="form-control"  value="<?php $data->adresse ?>">
                </div>
                <div class="form-group">
                    <input name="email" type="text" class="form-control"  value="<?php $data->email ?>">
                </div>
                <div class="form-group">
                    <input name="phone" type="text" class="form-control"  value="<?php $data->phone ?>">
                </div>
                <center><button name="login" type="submit" class="mx-auto btn ">Se connecter</button></center>
            </form>
        </body>
        </html>
        <?php
        
    }
}
?>