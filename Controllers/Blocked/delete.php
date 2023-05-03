<?php
include_once "./crud.php";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    CrudBlocked::Delete($_GET['id']);
    echo "ok";
} else {
    http_response_code(400);
    echo "id is not defined";
}
?>