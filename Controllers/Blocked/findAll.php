<?php
include "./crud.php";
$list = CrudBlocked::FindAll();
echo json_encode($list);
?>