<?php
require('../models/signalTextModel.php');
class signalTextController{
    public function getText($id){
        $m = new signalTextModel();
        return $m->getText($id);
    }
}
?>