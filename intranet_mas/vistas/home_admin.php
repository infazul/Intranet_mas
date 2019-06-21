<?php
    require '../db/database.php';
    require '../clases/usuario.php';
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $u = new usuario();
    $u = $_SESSION['usuario'];    
    if ($u->getPerfil() != 0) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Menu Administrador</title>
</head>
<body>
    <?php 
        require '../parciales/header.php'
    ?>
    <div class="sidenav">
        <a href="registrar_usuarios.php">Registrar Usuarios</a>
        <a href="eliminar_usuarios.php">Borrar Usuarios</a>
        <a href="modificar_usuarios.php">Modificar Usuarios</a>
    </div>   
</body>
</html>
