<?php
require_once 'func_helper.php';
$dbname = "pwebt8";
$tbname = "account";

function connect($host = "127.0.0.1", $username = "root", $password = null, $db = null, $port = null): mysqli
{
    $connection = new mysqli($host, $username, $password, $db, $port);
    $msgSuccess = "Connection Success";
    $msgFailed = "Connection Error";

    if ($db !== null) {
        $msgSuccess = "Connection With DB Success";
        $msgFailed = "Connection With DB Failed";
    }

    if ($connection->connect_error) {
        $msg = $connection->connect_error;
        $connection->close();
        move("error.php?loc=index.html&title=$msgFailed&msg=$msg");
    }

    echoToConsole($msgSuccess);
    return $connection;
}
