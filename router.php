<?php
require($_SERVER['DOCUMENT_ROOT']."/matrans-admins".'/vues/loginPageVue.php');
$v  = new loginPageVue();
$v->displayPage();
?>