<?php 
# Incluimos la configuracion
require 'database.php';
require 'usuario.php';
session_start();
$u = new usuario();
$u = $_SESSION['usuario'];    
if ($u->getPerfil() != 3) {
    header("Location: index.php");
}
# Buscamos los mensajes privados
$sql = 'SELECT * FROM mensaje WHERE para="'.$u->getCorreo().'"';
$stmt = $conn->prepare($sql);
$stmt->execute();
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
    foreach ($stmt as $row){ ?>
    <tr bgcolor="<?php if($row['leido'] == "si") { echo "#FFE8E8"; } else { if($i%2==0) { echo "#FFE7CE"; } else { echo "#FFCAB0"; } } ?>">
      <td align="center" valign="top"><?=$row['id']?></td>
      <td align="center" valign="top"><a href="leer.php?id=<?=$row['id']?>"><?=$row['asunto']?></a></td>
      <td align="center" valign="top"><?=$row['de']?></td>
	  <td align="center" valign="top"><?=$row['fecha']?></td>
    </tr>
<?php 
} ?>
</table>
</body>
</html>
