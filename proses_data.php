<?php
require_once 'connection.php';
$id = $_POST['id'];
$todo = $_POST['do'];
if ($todo === "get") {
    $what = $_POST['key'];
    $connection = connect(db: $dbname, debug: false);
    $sql = "";
    if ($what === "all") {
        $sql = "select * from $tbname where id = $id";
    } else if ($what === "username") {
        $sql = "select username from $tbname where id = $id";
    } else {
        $connection->close();
        error("view_data.php", "Unknown Request", "Wrong Request From view data page", "id = $id, do = $todo");
    }
    $result = $connection->query($sql);
    if ($result) {
        echo implode(",", $result->fetch_row());
    }
} else {
    $connection = connect(db: $dbname);
    if ($todo === "update") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $sql = "update $tbname set username='$username', password='$password', email='$email' where id = $id";
        $result = $connection->query($sql);
        if ($result) {
            echoToConsole("Success Update Data");
            move("view_data.php");
        } else {
            $msg = $connection->connect_error .= "id = $id, do = $todo";
            $connection->close();
            error("view_data.php", "Failed Update Data", $msg);
        }
    } else if ($todo === "delete") {
        $sql = "delete from $tbname where id = $id";
        $result = $connection->query($sql);
        if ($result) {
            echoToConsole("Success Delete Data");
            move("view_data.php");
        } else {
            $msg = $connection->connect_error .= "id = $id, do = $todo";
            $connection->close();
            error("view_data.php", "Failed Delete Data", $msg);
        }
    } else {
        $connection->close();
        error("view_data.php", "Unknown Request", "Wrong Request From view data page", "id = $id, do = $todo");
    }
}