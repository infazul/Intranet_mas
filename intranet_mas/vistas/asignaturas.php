<?php
    require '../db/database.php';
    require '../clases/usuario.php';
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
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Menu Alumno</title>
</head>
<body>
    <?php 
        require '../parciales/header.php'
    ?>
    <div class="sidenav">
        <a href="asignaturas.php">Asignaturas</a>
        <a href="foro.php">Foro</a>
        <a href="mensajes.php">Mensajes</a>
    </div> 
<div class="cont">
<h1>Asignaturas</h1></br>
<a>+ Matematicas</a></br></br>
<a>+ Lenguaje</a></br></br>
<a>+ Ciencias Naturales</a></br></br>
<a>+ Historia</a></br></br>
<a>+ Ingles</a></br></br>
</div>
    
</body>
</html>