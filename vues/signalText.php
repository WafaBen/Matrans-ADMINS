<?php
require('../controllers/signalTextController.php');
require('./components.php');
$id = $_GET['id'];
$c = new signalTextController();

?>

<html lang="en">
        <head>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'  />
            <title>Signalement</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        </head>
        <header>
        <?php
            $comp = new component();
            echo $comp->getNavBar();
        ?>
        </header>
        <body>
            <div class="container mt-5">
                <div class="card ">
                <div class="card-body">
                    <h5 class="card-title">Le texte du signalement</h5>
                    <?php echo $c->getText($id)[0]["texte"];  ?>
                </div>
                </div>
            </div>
        </body>
</html>


<?php
?>