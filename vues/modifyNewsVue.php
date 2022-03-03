<?php
require('./components.php');
require('../controllers/modifyNewsController.php');
    $id =$_GET["id"];
    $v = new modifyNewsVue();
    $v->displayPage($id);

class modifyNewsVue{
    private $c;
    function __construct(){
        $this->c = new modifyNewsController();
    }
    public function displayPage($id){
        $data = $this->c->getNew($id);
        ?>
        <?php
            $this->c->modify();
        ?>
        <html lang="en">
        <head>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'  />
            <title>News</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="../CSS/style.css" />
        </head>
        <body>
            <?php
                $c = new component();
                echo $c->getNavBar();
            ?>
            <h5 class="mt-3 text-center">Modifier une annonce</h5>
            <form class="col-3 mx-auto mt-4" method="post">
                <div class="form-group">
                    <label>La date d'ajout</label>
                    <input name="titre" type="text" class="form-control"  value="<?php echo $data[0]["date"]; ?>" readonly/>
                </div>
                <div class="form-group">
                    <label>Le titre</label>
                    <input name="titre" type="text" class="form-control"  value="<?php echo $data[0]["titre"]; ?>"/>
                </div>
                <div class="form-group">
                    <label>La description</label>
                    <input name="desc" type="text" class="form-control"  value="<?php echo $data[0]["description"];?>"/>
                </div>
                <div class="form-group">
                    <img style="width:200px;height:200px;" src="<?php echo $data[0]["image"]; ?>"/>
                    <input name="image" type="file" class="form-control"   />
                </div>
                <div class="form-group ">
                    <input  name="id" type="hidden" value="<?php echo $id ?>" />
                 </div>
                <center><button name="modify" type="submit" class="mx-auto btn ">Modifier</button></center>
            </form>
            <?php
             if(isset($_POST["modify"])){
                echo '<script type="text/JavaScript"> 
                alert("new modifié avec succès");
                </script>';
            }
            ?>
        </body>
        </html>
        <?php
        
    }
}
?>