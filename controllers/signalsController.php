<?php
require('../models/signalsModel.php');
class signalsController{
    public function getSignals(){
        $m = new signalsModel();
        return $m->getSignals();
    }
}
?>