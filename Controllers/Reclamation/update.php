<?php
include_once("./crud.php");
$json = file_get_contents('php://input');
$data = json_decode($json);

if (
    isset($data->id) &&
    isset($data->client) &&
    isset($data->subject) &&
    isset($data->content)
) {
    if (
        !empty($data->id) &&
        !empty($data->client) &&
        !empty($data->subject) &&
        !empty($data->content)
    ) {
        $err = CrudReclamation::Update($data);
        if ($err == null) {
            http_response_code(200);
        } else {
            http_response_code(400);
            echo $err;
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