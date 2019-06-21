<?php 
# Incluimos la configuracion
require '../db/database.php';
require '../clases/usuario.php';
session_start();

$u = new usuario();
$u = $_SESSION['usuario'];    
$mensaje = $u->getCorreo();
if ($u->getPerfil() == 0 OR $u->getPerfil() == null) {
    header("Location: index.php");
}
if(isset($_POST['enviar']))
{
	if(!empty($_POST['para']) && !empty($_POST['asunto']) && !empty($_POST['texto']))
	{
		
        $sql = "INSERT INTO mensaje (para, de, fecha, asunto, texto) VALUES (:para, :de, :fecha, :asunto, :texto)";
        $stmt = $conn->prepare($sql);
        
        $para = $_POST['para'];
        $de = $u->getCorreo();
        $fecha = date("j/m/Y, g:i a");
        $asunto = $_POST['asunto'];
        $texto = $_POST['texto'];

        $stmt->bindParam(':para', $para);
        $stmt->bindParam(':de', $de);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':asunto', $asunto);
        $stmt->bindParam(':texto', $texto);

        if ($stmt->execute()) {
            $mensaje = 'Mensaje enviado';
            
        } else {
            $mensaje = 'No se ha podido enviar el mensaje';
        }
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
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

    <?php if(!empty($mensaje)): ?>
      <p> <?= $mensaje ?></p>
    <?php endif; ?> 
    <br/>
Menu: <a href="listar_mensajes.php">|   Ver mensajes</a> |<br />

<form method="post" action="" >
<br />
Para:<br />
<input type="text" name="para" /><br />
Asunto:<br />
<input type="text" name="asunto" /><br />
Mensaje:<br />
<textarea type="texto" name="texto"></textarea>
<br /><br />
<input type="submit" name="enviar" value="Enviar" />
</form>
    
</body>
</html>

