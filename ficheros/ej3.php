<?php
error_reporting(E_ALL);

$error=date('Y-m-d\TH:i:sP');
file_put_contents("log.txt", $error, FILE_APPEND);

?>