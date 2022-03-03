<?php
class component{
    public function getNavBar(){
        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="../assets/logo-nbg.png" width="50" height="50" alt="">
                </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="./accueilVue.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./utilisateursVue.php">Gestion des utilisateurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./annoncesVue.php">Gestion des annonces</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./signalsVue.php">Gestion des signalements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./newsVue.php">Gestion des news</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contenuVue.php">Gestion du contenu</a>
                </li>
                </ul>
            </div>
        </nav>
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
                        <form class="form-inline" method="post">
                            <div class="form-group ">
                                <input  name="id" type="hidden" value="<?php echo $v["id"] ?>" />
                            </div>
                            <div class="form-group ">
                                <?php if($v["banned"]==1){
                                    ?><p>banis</p><?php
                                }else{
                                    ?><input  name="banir" type="submit" class="form-control btn btn-danger" value="Bannir" /><?php
                                } ?>
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
    public function resultModel($v){
        if($v){
            return $this->successModel();
        }
        else{
            return $this->failModel();
        }
        
    }
    private function successModel(){
        ?>
        <div id="modal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
             <p>La suppréssion a été déroulée avec succès<p>
            </div>
        </div>
        </div>
        <?php
    }
    private function failModel(){
        ?>
        <div id="modal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
             <p>La suppréssion a échoué<p>
            </div>
        </div>
        </div>
        <?php
    }

}
?>