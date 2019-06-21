<?php
    require '../db/database.php';
    require '../clases/usuario.php';
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $u = new usuario();
    $u = $_SESSION['usuario'];    
    if ($u->getPerfil() != 2) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/../style.css">
    <title>Menu Apoderado</title>
</head>
<body>
    <?php 
        require '../parciales/header.php'
    ?>
    <div class="sidenav">
        <a href="avance.php">Avance Alumno</a>
        <a href="foro.php">Foro</a>
        <a href="mensajes.php">Mensajes</a>
    </div> 

    
</body>
</html>