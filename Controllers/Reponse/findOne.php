<?php
include_once "./crud.php";

$CrudReclamation = new Crudreponse();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $rec =  $CrudReclamation->FindOne($_GET['id']);
    echo json_encode($rec);
} else {
    http_response_code(400);
    echo "id is not defined";
}
?>