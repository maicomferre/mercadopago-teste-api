<?php

$input = file_get_contents("php://input");
$event = json_decode($input, true);

file_put_contents('webhook.log', print_r($event, true), FILE_APPEND);

http_response_code(200);

?>
