<?php
include('database.php');
/*recibimos el valor del select*/
//$id_id=$_POST["elegido"];
$id = 4; 
 
$salida0="";
$consulta = ("SELECT * FROM  usuarios WHERE id = $id");
$resultado = $conn->query($consulta);
$arraydatos = $resultado->fetch();

print_r($arraydatos);
/*
print $arraydatos['perfil'];
print $arraydatos['primer_nombre'];
print $arraydatos['segundo_nombre'];
print $arraydatos['primer_apellido'];
print $arraydatos['segundo_apellido'];
*/


 /*
$salida1 ="";
$sql1 =  ("SELECT DISTINCT ci, direccion FROM  persona WHERE id = $id_id");
$mysql1 = $conn->query($sql1);
$des1 = $mysql1->fetchAll();
foreach ($des1 AS $mysql1) {
    $nom_nom = trim($mysql1[1])." ".trim($mysql1[2])." ".trim($mysql1[0]);
    $salida1 .= "<label>".utf8_encode($nom_nom)."</label>";
}
 
$salida2="";
$combog2 = ("SELECT DISTINCT * FROM  persona WHERE id = $id_id");
$result2 = $conn->query($combog2);
$valor2 = $result2->fetchAll();
foreach ($valor2 AS $result2)
{
$salida2 .= "<label>".$result2[3]."</label>";
}
 
echo $salida0."[-]".$salida1."[-]".$salida2;*/
?>