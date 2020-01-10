<?php

$host="localhost";
$user="garaguly.csaba";
$pass="asd123";
$database="localhost";

try {
    $mysql = new mysqli($host, $user, $pass, $database);
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

$mysql->query("CREATE TABLE IF NOT EXISTS `test_table`(`A` int primary key, `B` int)");

//Hozzáadunk egy sort a táblához
if (!$mysql) 
{
    for ($i=0; $i < 20; $i++) 
    { 
        if (!$mysql->query("INSERT INTO `test_table` VALUES ($i, POW($i, 2))")) 
        {
            die("ERROR ".$mysql->error_list[0]["error"]);
        }
        
    }
}

//egy új statementet definiálva lekérdezem a tábla tartalmát
$query = $mysql->query("SELECT * FROM v");
print_r($query->fetch_array());

//Kapcsolat bontása
$mysql->close();