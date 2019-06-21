<?php
    require 'database.php';
    require 'usuario.php';
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $u = new usuario();
    $u = $_SESSION['usuario'];    
    if ($u->getPerfil() != 3) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu Alumno</title>
</head>
<body>
    <?php 
        require 'header.php'
    ?>
    <div class="sidenav">
        <a href="asignaturas.php">Asignaturas</a>
        <a href="foro.php">Foro</a>
        <a href="mensajes.php">Mensajes</a>
    </div> 

    
</body>
</html>