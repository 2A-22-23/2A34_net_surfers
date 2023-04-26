<?php
    require_once '../Controller/eventC.php';
    $eventC = new eventC();
    if (isset ($_GET["id"])&&!empty($_GET["id"])){
        $list = $eventC->delete($_GET["id"]);
        header('location:viewEvent.php');
    }
    else {
        echo "undefined id";
    }
?>