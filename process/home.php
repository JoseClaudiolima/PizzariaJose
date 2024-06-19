<?php
include_once("conn.php");

function insertpizza($conn){
    //$stmt = $conn->prepare("INSERT INTO pizzas (massa)");
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method === "GET"){
    $bordaQuery = $conn->query("SELECT * FROM borda");
    $bordas = $bordaQuery->fetchAll();

    $massaQuery = $conn->query("SELECT * FROM massa");
    $massas = $massaQuery->fetchAll();

    $saboresQuery = $conn->query("SELECT * FROM sabores");
    $sabores = $saboresQuery->fetchAll();
} else if($method === "POST"){}


?>