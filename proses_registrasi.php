<?php
require_once 'connection.php';

$connection = connect();
// Make database if not exists
$sql = "create database if not exists $dbname;";
$result = $connection->query($sql);
if ($result) {
    echoToConsole("DATABASE READY");

    // change connection into database
    $connection = connect(db: $dbname);

    // Make table account if not exists
    $sql = "create table if not exists $tbname(
        id int(6) unsigned auto_increment primary key,
        username varchar(30) not null unique key,
        password varchar(30) not null,
        email    varchar(60) not null unique key
    );";

    $result = $connection->query($sql);
    if ($result) {
        echoToConsole("TABLE READY");

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $sql = "INSERT INTO $tbname (id, username, password, email)VALUES(NULL,'$username','$password','$email')";
        $result = $connection->query($sql);
        if ($result) {
            $connection->close();
            echoToConsole("Insert Data Success");
            move("view_data.php");
        } else {
            $connection->close();
            move("error.php?loc=index.php&title=Insert Error&msg=Insert Data Failed.<br>Data : $username, $password, $email");
        }
    } else {
        $connection->close();
        echoToConsole("TABLE CAN'T BE CREATED");
        move("error.php?loc=index.php&title=Table Error&msg=TABLE CAN'T BE CREATED");
    }
} else {
    $connection->close();
    echoToConsole("DATABASE CAN'T BE CREATED");
    move("error.php?loc=index.php&title=Database Error&msg=DATABASE CAN'T BE CREATED");
}