<?php

$host="localhost";
$user="garaguly.csaba";
$pass="asd123";
$database="localhost";

try {
    $pdo = new PDO("mysql:host={$host};dbname={$database}", $user, $pass);
} catch (PDOException $e) {
    echo $e->getMessage();
    print_r($e);
}

$a = "\"\" or 1=1";
$b = "\"\" or 1=1";

$statement = $pdo->prepare("SELECT * FROM `test_table` WHERE A = {$a} AND B = {$b}");

try {
    if (!$statement->execute())
    {
        throw new PDOException($statement->error);
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

