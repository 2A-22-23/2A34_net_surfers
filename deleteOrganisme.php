<?php
    require_once '../Controller/organismeC.php';
    $organismeC = new organismeC();
    if (isset ($_GET["id"])&&!empty($_GET["id"])){
        $list = $organismeC->delete($_GET["id"]);
        header('location:viewOrganisme.php');
    }
    else {
        echo "undefined id";
    }
?>