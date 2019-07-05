<?php 
# Incluimos la configuracion
require '../db/database.php';
require '../clases/usuario.php';
session_start();
$u = new usuario();
$u = $_SESSION['usuario'];    
if ($u->getPerfil() == 0 OR $u->getPerfil() == null) {
    header("Location: index.php");
}
# Buscamos los mensajes privados
$sql = 'SELECT * FROM mensajes WHERE destinatario="'.$u->getCorreo().'"';
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


Menu: | <a href="crear_mensaje.php">Crear mensajes</a> |<br /><br />
  <table width="800" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td width="53" align="center" valign="top"><strong>ID</strong></td>
      <td width="426" align="center" valign="top"><strong>Asunto</strong></td>
      <td width="321" align="center" valign="top"><strong>De</strong></td>
	  <td width="321" align="center" valign="top"><strong>Fecha</strong></td>
    </tr>
    <?php
    //while($row = mysql_fetch_assoc($res))
    $i=0;
    foreach ($stmt as $row){ ?>
    <tr bgcolor="<?php if($row['leido'] == "si") { echo "#90dcf5"; } else { if($i%2==0) { echo "#7ec0d6"; } else { echo "#FFCAB0"; } } ?>">
      <td align="center" valign="top"><?=$row['id']?></td>
      <td align="center" valign="top"><a href="leer_mensajes.php?id=<?=$row['id']?>"><?=$row['asunto']?></a></td>
      <td align="center" valign="top"><?=$row['remitente']?></td>
	  <td align="center" valign="top"><?=$row['fecha']?></td>
    </tr>
<?php $i ++;
} ?>
</table>
</body>
</html>
