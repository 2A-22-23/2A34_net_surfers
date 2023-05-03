<?php
include_once "./crud.php";

$CrudReclamation = new CrudReclamation();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $CrudReclamation->Delete($_GET['id']);
    echo "ok";
} else {
    http_response_code(400);
    echo "id is not defined";
}
?>