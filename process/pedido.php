<?php
include_once("conn.php");

$method = $_SERVER['REQUEST_METHOD'];

if ($method === "GET"){
    $bordaQuery = $conn->query("SELECT * FROM borda");
    $bordas = $bordaQuery->fetchAll();

    $massaQuery = $conn->query("SELECT * FROM massa");
    $massas = $massaQuery->fetchAll();

    $saboresQuery = $conn->query("SELECT * FROM sabores");
    $sabores = $saboresQuery->fetchAll();
} else if($method === "POST"){
    $data = $_POST;
    
    $bordaId = $data['borda'];
    $massaId = $data['massa'];
    $saborId = isset($data['sabores']) ? $data['sabores'] : []; //TERNARIO

    // Verificação e erros
    if ($bordaId == 0){
        $_SESSION['mensagem'] = "Selecione uma borda válida!";
        $_SESSION['notification'] = "warning";
    }  else  if ($massaId == 0){
        $_SESSION['mensagem'] = "Selecione uma massa válida!";
        $_SESSION['notification'] = "warning";
    } else if (empty($saborId)){
        $_SESSION['mensagem'] = "Selecione até 2 sabores!";
        $_SESSION['notification'] = "warning";
    } else if (count($saborId) > 2){
        $_SESSION['mensagem'] = "Selecione no máximo 2 sabores!";
        $_SESSION['notification'] = "warning";

    } else{ //Sucesso!
        
        $stmt = $conn->prepare("INSERT INTO pizzas (idMassa, idBorda) VALUES (:idMassa, :idBorda)");
        $stmt->bindParam(":idMassa", $massaId, PDO::PARAM_INT);
        $stmt->bindParam(":idBorda", $bordaId, PDO::PARAM_INT);
        $stmt->execute();
        //colunas idPizza idMassa idBorda
        $pizzaId = $conn->lastInsertId();
        
        foreach($saborId as $umSaborId){
            $stmt = $conn->prepare("INSERT INTO sabores_pizza (idPizza,idSabores) VALUES (:idPizza, :idSabores)");
            $stmt->bindParam(":idPizza", $pizzaId, PDO::PARAM_INT);
            $stmt->bindParam(":idSabores", $umSaborId, PDO::PARAM_INT);
            $stmt->execute();
        }; //colunas idSaborPizza idPizza idSabores

        $stmt = $conn->prepare("INSERT INTO  pedidos (idPizza, idStatus) VALUES (:idPizza, :idStatus)");
        $statusId = 1; // Pois sempre se iniciará com "Em Produção"
        $stmt->bindParam(":idPizza", $pizzaId, PDO::PARAM_INT);
        $stmt->bindParam(":idStatus", $statusId, PDO::PARAM_INT);
        $stmt->execute();
        //colunas idPedidos idPizza idStatus

        $_SESSION['mensagem'] = "Pedido realizado com sucesso!";
        $_SESSION['notification'] = "success";
    }

    header("Location: .."); // Retorna a pagina home
}

    
?>