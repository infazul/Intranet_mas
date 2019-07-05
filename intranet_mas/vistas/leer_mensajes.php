<?php
    require '../db/database.php';
    require '../clases/usuario.php';
    session_start();
    $u = new usuario();
    $u = $_SESSION['usuario']; 
    if ($u->getPerfil() == 0 OR $u->getPerfil() == null) {
        header("Location: index.php");
    }
    $id = $_GET['id'];
    $sql = 'SELECT * FROM mensajes WHERE destinatario="'.$u->getCorreo().'" and id="'.$id.'"';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Mensajes</title>
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
        echo $u->getNombre() . " " . $u->getApellido(). "<br/>";

    ?>
    Menu: <a href="listar_mensajes.php">Ver mensajes</a> | <a href="crear_mensaje.php">Crear mensajes</a> <br/>
    <?php foreach ($stmt as $row){ ?>
<strong>De:</strong> <?=$row['remitente']?><br />
<strong>Fecha:</strong> <?=$row['fecha']?><br />
<strong>Asunto:</strong> <?=$row['asunto']?><br /><br />
<strong>Mensaje:</strong><br /><br />
<?=$row['mensaje']?>

<?php 
# Avisamos que ya lo leimos
if($row['leido'] != "si")
{
    $query = 'UPDATE mensajes SET leido="si" WHERE ID="'.$id.'"';
    $stmt2 = $conn->prepare($query);
    $stmt2->execute();
}
?>    
    
    <?php } ?>


</body>
</html>

