<?php
include_once("conn.php");

function bordaName ($id){
    global $conn;
    $stmtBorda = $conn->prepare("SELECT * FROM borda WHERE idBorda = :idBorda");
    $stmtBorda->bindParam(":idBorda", $id, PDO::PARAM_INT);
    $stmtBorda->execute();
    return $stmtBorda->fetch();
}

function massaName ($id){
    global $conn;
    $stmtMassa = $conn->prepare("SELECT * FROM massa WHERE idMassa = :idMassa");
    $stmtMassa->bindParam(":idMassa", $id, PDO::PARAM_INT);
    $stmtMassa->execute();
    return $stmtMassa->fetch();
}

function saboresName($id){
    global $conn;
    $stmtSabores = $conn->prepare("SELECT sabor FROM sabores WHERE idSabores = :idSabor");
    $stmtSabores->bindParam(":idSabor", $id, PDO::PARAM_INT);
    $stmtSabores->execute();
    return ($stmtSabores->fetch())['sabor'];
}

function saboresArr($id){
    global $conn;
    $stmtSabores = $conn->prepare("SELECT idSabores FROM sabores_pizza WHERE idPizza = :idPizza");
    $stmtSabores->bindParam(":idPizza", $id, PDO::PARAM_INT);
    $stmtSabores->execute();
    $idSabor = $stmtSabores->fetchAll();
    return $idSabor;
}

function statusName($id){
    global $conn;
    $stmt = $conn->prepare("SELECT idStatus FROM pedidos WHERE idPizza = :idPizza");
    $stmt->bindParam(":idPizza", $id, PDO::PARAM_INT);
    $stmt->execute();
    $idStatus = ($stmt->fetch())['idStatus'];
    return $idStatus;
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method === "GET"){
    $itens = $conn->query("SELECT * FROM pizzas");
    $statusQ = $conn->query("SELECT * FROM status");
    $status = $statusQ->fetchAll();

} else if ($method === "POST"){
    $type = $_POST['type'];

    if ($type === "delete"){
        $idPizza = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM pedidos WHERE idPizza = :idPizza");
        $stmt->bindParam(":idPizza", $idPizza, PDO::PARAM_INT);
        $stmt->execute();

        $stmt = $conn->prepare("DELETE FROM sabores_pizza WHERE idPizza = :idPizza");
        $stmt->bindParam(":idPizza", $idPizza, PDO::PARAM_INT);
        $stmt->execute();

        $stmt = $conn->prepare("DELETE FROM pizzas WHERE idPizza = :idPizza");
        $stmt->bindParam(":idPizza", $idPizza, PDO::PARAM_INT);
        $stmt->execute();
    } else if($type === "update"){
        $status = $_POST['status'];
        $id = $_POST['id'];

        $stmt = $conn->prepare("UPDATE pedidos SET idStatus = :status WHERE idPizza = :id");
        $stmt->bindParam(":status", $status, PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION['mensagem'] = "Sucesso ao alterar o status do pedido!";
        $_SESSION['notification'] = "success";
    }
    
    header("Location: ../dashboard.php");
}

?>