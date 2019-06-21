<?php 
    require '../db/database.php';

    $mensaje = '';

    if (!empty($_POST['rut']) && !empty($_POST['password']) && !empty($_POST['primer_nombre']) && !empty($_POST['primer_apellido']) ){
        
        $sql = "UPDATE usuarios SET rut=':rut',password=':password', correo=':correo',perfil=':perfil',primer_nombre=':primer_nombre',segundo_nombre=':segundo_nombre',primer_apellido=':primer_apellido',segundo_apellido=':segundo_apellido' WHERE id=':id_u'";
        $stmt = $conn->prepare($sql);
        
        $id_u = $_POST['id_u'];
        $rut = $_POST['rut'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $perfil = $_POST['perfil'];
        $correo = $_POST['correo'];
        $primer_nombre = $_POST['primer_nombre'];
        $segundo_nombre = $_POST['segundo_nombre'];
        $primer_apellido = $_POST['primer_apellido'];
        $segundo_apellido = $_POST['segundo_apellido'];

        $stmt->bindParam(':id_u', $id);
        $stmt->bindParam(':rut', $rut);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':perfil', $perfil);
        $stmt->bindParam(':primer_nombre', $primer_nombre);
        $stmt->bindParam(':segundo_nombre', $segundo_nombre);
        $stmt->bindParam(':primer_apellido', $primer_apellido);
        $stmt->bindParam(':segundo_apellido', $segundo_apellido);
        
        if ($stmt->execute()) {
            $mensaje = 'Usuario modificado satisfactoriamente';
            
        } else {
            $mensaje = 'No se ha podido modificar usuario' . $id_u;
        }

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modificar Usuarios</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
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
    <form action="modificar_usuarios.php" method="post">
        <?php if(!empty($mensaje)): ?>
            <p> <?= $mensaje ?></p>
        <?php endif; ?>
        <?php            
            echo '<div class="caja">';
            echo '<select name="id_u">';
            echo '<option value="">Seleccionar </option>';
            $sql = "SELECT * FROM usuarios ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
             foreach ($stmt as $row) {
                echo '<option value="'.$row['id'].'">'.$row['rut'].'   '.$row['primer_nombre'].' '.$row['primer_apellido'].'</option>';
             }
            echo '</select>';
            echo '</div>';
        ?>
        Ingrese datos a modificar
        <input type="text" id="rut" name="rut" placeholder="Ingrese el rut">
        <input type="password" name="password" placeholder="Ingrese una contraseña">
        <div class="caja">
            <select name="perfil" id="p">
                <option value="3">Alumno</option>
                <option value="2">Apoderado</option>
                <option value="1">Profesor</option>
                <option value="0">Administrador</option>
            </select>
        </div>
        <input type="text" name="correo" placeholder="correo">
        <input type="text" name="primer_nombre" placeholder="Primer Nombre">
        <input type="text" name="segundo_nombre" placeholder="Segundo Nombre">
        <input type="text" name="primer_apellido" placeholder="Primer Apellido">
        <input type="text" name="segundo_apellido" placeholder="Segundo Apellido">
        <input type="submit" value="Guardar">
    </form>

</body>
</html>


