<?php
    require_once '../Controller/userC.php';
    $userC = new userC();

    if (isset ($_GET["id"])&&!empty($_GET["id"])){
        $list = $userC->delete_user($_GET["id"]);
        header('location:viewuser.php');
    }
    else {
        echo "undefined id";
    }
?>