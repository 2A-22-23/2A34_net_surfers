<?php
include "./crud.php";
$list = CrudReclamation::FindAll();
echo json_encode($list);
?>