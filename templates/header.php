<?php
include("process/conn.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzaria</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Fonte Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!--Google icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
    
<header>
    <a href="index.php"> <img src="img/pizza.svg" alt=""> </a>
    <a href="https://github.com/JoseClaudiolima/testepizzariajoao" target="_blank">
        <p>Pizzaria do José</p>
    </a>
    <a href="dashboard.php" id="dashboard">Dashboard</a>
</header>





<?php if(isset($_SESSION['mensagem']) && !empty($_SESSION['mensagem']) ):?>
    <div class='<?= $_SESSION['notification']?>'>
        <p id="pnot"><?=$_SESSION['mensagem']; ?></p>
    </div>
<?php
    $_SESSION['mensagem'] = '';
    $_SESSION['notification'] = '';
endif ?>
