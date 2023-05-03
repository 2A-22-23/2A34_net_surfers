<?php
include_once("./crud.php");

$json = file_get_contents('php://input');
$dto = json_decode($json);

if (isset($_GET['usrn'])) {
    if (!empty($_GET['usrn'])) {
        $result = CrudBlocked::insert($_GET['usrn']);
        if ($result == null) {
            http_response_code(200);
        } else {
            http_response_code(400);
            echo ("OPPS, we had some errors");
        }
    } else {
        http_response_code(400);
        echo ("OPPS, some fields are empty.");
    }
} else {
    http_response_code(400);
    echo ("OPPS, missing some fields.");
}
?>