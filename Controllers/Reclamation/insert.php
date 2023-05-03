<?php
include_once("./crud.php");


$json = file_get_contents('php://input');
$dto = json_decode($json);



if (isset($dto->client) && isset($dto->subject) && isset($dto->content)) {
    if (!empty($dto->client) && !empty($dto->subject) && !empty($dto->content)) {
        $blocked = CrudReclamation::IsBlocked($dto->client);
        if ($blocked) {
            http_response_code(400);
            echo ("You are blocked.");
            return;
        }
        $result = CrudReclamation::insert($dto);
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