<?php 
    require 'database.php';
    
    $mensaje = '';
    

    if (!empty($_POST['id'])) {

        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $_POST['id']);
        
        if ($stmt->execute()) {
            $mensaje = 'Usuario eliminado satisfactoriamente';
            
        } else {
            $mensaje = 'No se ha podido eliminar usuario';
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Borrar Usuarios</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php 
        require 'header.php'
    ?>
    <div class="sidenav">
        <a href="registrar_usuarios.php">Registrar Usuarios</a>
        <a href="eliminar_usuarios.php">Borrar Usuarios</a>
        <a href="modificar_usuarios.php">Modificar Usuarios</a>
    </div>   

<?php if(!empty($mensaje)): ?>
      <p> <?= $mensaje ?></p>
<?php endif; ?>

    <form action="eliminar_usuarios.php" method="post">
        <?php 
            echo '<div class="caja">';
            echo '<select name="id">';
            echo '<option value="">Seleccionar </option>';
            $sql = "SELECT * FROM usuarios ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
             foreach ($stmt as $row) {
                echo '<option value="'.$row['id'].'">'.$row['rut'].' - '.$row['primer_nombre'].' '.$row['primer_apellido'].'</option>';
             }
            echo '</select>';
            echo '</div>';


        ?>
        <input type="submit" value="Borrar">
    </form>
</body>
</html>