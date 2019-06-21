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
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Mensajes</title>
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
<?php
    $sql = 'SELECT * FROM mensaje WHERE para="' .$u->getId().'" and leido IS NULL"';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $cuenta = $stmt->rowCount();
    ?>
    Menu: <a href="listar_mensajes.php">Ver mensajes</a> | <a href="crear_mensaje.php">Crear mensajes</a><br /><br />
    Hola <?=$u->getNombre()?>, Usted tiene <?=$cuenta?> mensajes sin leer.
</body>
</html>

