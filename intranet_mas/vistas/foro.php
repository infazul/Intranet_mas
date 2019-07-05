<?php
    require '../db/database.php';
    require '../clases/usuario.php';
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $u = new usuario();
    $u = $_SESSION['usuario'];    
    if ($u->getPerfil() == 0) {
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
        require '../parciales/header.php';

        if ($u->getPerfil() == 3) {
            echo '<div class="sidenav">
            <a href="asignaturas.php">Asignaturas</a>
            <a href="foro.php">Foro</a>
            <a href="mensajes.php">Mensajes</a>
        </div>';
        }elseif($u->getPerfil() == 2){
            echo '<div class="sidenav">
            <a href="avance.php">Avance Alumno</a>
            <a href="foro.php">Foro</a>
            <a href="mensajes.php">Mensajes</a>
        </div>';
        }elseif($u->getPerfil() == 1){
            echo '<div class="sidenav">
            <a href="grados.php">Grado Academico</a>
            <a href="foro.php">Foro</a>
            <a href="mensajes.php">Mensajes</a>
        </div>';
        }
    ?>
	<div class="cont">
		<h1>Foro</h1></br>
		
	</div>
	    
</body>
</html>