<?php

    $log = 'webhook.log';

    file_put_contents($log, print_r($_POST, true), FILE_APPEND);

    http_response_code(200);

?>
