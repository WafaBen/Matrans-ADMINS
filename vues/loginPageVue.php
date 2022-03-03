<?php
class loginPageVue{
    public function displayPage(){
        ?>
        <?php
            require('./controllers/loginController.php');
            $c = new loginController();
            $msg = $c->login();
            ?>
        <html lang="en">
        <head>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'  />
            <title>Matrans admins</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="./CSS/style.css" />
        </head>
        <body>
            <center><img class="logo" src="./assets/logo.PNG" alt="Matrans logo"/></center>
            <h3 class="text-center title mt-3">Connexion</h3>
            <form class="col-3 mx-auto mt-2" method="post">
                <div class="form-group">
                    <input name="name" type="text" class="form-control"  placeholder="Entrez le nom d'utilisateur">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Mot de passe">
                </div>
                <?php
                ?>
                
                <?php
                ?>
                <div class=" alert-danger" role="alert">
                    <?php echo $msg; ?>
                </div>
                <center><button name="login" type="submit" class="mx-auto btn ">Se connecter</button></center>
            </form>
        </body>
        <?php
    }
}
?>