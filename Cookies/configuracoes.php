<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "compras";

$link = new mysqli($server, $user, $password, $db);

try {
    if ($link->connect_error) {
        throw new Exception("connection failed: " . $link->connect_error);
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    die("Não foi possível conectar ao banco de dados");
}