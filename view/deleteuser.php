<?php
    require_once '../Controller/userC.php';
    require_once '../Controller/congeC.php';
    $userC = new userC();
    $congeC = new congeC();

    if (isset ($_GET["id"])){
        $list = $congeC->delete_conge($_GET["id"]);
        $list = $userC->delete_user($_GET["id"]);
        header('location:viewuser.php');
    }
    else {
        echo "undefined id";
    }
?>