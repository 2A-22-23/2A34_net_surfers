<?php
include "./crud.php";
$list = Crudreponse::FindAll();
echo json_encode($list);
?>