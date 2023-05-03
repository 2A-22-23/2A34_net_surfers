<?php
    require_once '../Controller/congeC.php';
    $congeC = new congeC();

    if (isset ($_GET["id"])){
        $list = $congeC->delete_conge1($_GET["id"]);
        header('location:viewconge.php');
    }
    else {
        echo "undefined id";
    }
?>