<?php
    require '../db/database.php';

    $mensaje = '';

    if (!empty($_POST['rut']) && !empty($_POST['password']) && !empty($_POST['primer_nombre'] && !empty($_POST['primer_apellido']) ) ){

        $sql = "INSERT INTO usuarios (rut, password, perfil, correo, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido ) VALUES (:rut, :password, :perfil, :correo, :primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido)";
        $stmt = $conn->prepare($sql);
        
        $rut = $_POST['rut'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $perfil = $_POST['perfil'];
        $correo = $_POST['correo'];
        $primer_nombre = $_POST['primer_nombre'];
        $segundo_nombre = $_POST['segundo_nombre'];
        $primer_apellido = $_POST['primer_apellido'];
        $segundo_apellido = $_POST['segundo_apellido'];

        $stmt->bindParam(':rut', $rut);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':perfil', $perfil);
        $stmt->bindParam(':primer_nombre', $primer_nombre);
        $stmt->bindParam(':segundo_nombre', $segundo_nombre);
        $stmt->bindParam(':primer_apellido', $primer_apellido);
        $stmt->bindParam(':segundo_apellido', $segundo_apellido);
        
        if ($stmt->execute()) {
            $mensaje = 'Usuario agregado satisfactoriamente';
            
        } else {
            $mensaje = 'No se ha podido agregar usuario';
        }

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuarios</title>
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
    <?php if(!empty($mensaje)): ?>
      <p> <?= $mensaje ?></p>
    <?php endif; ?>
    <h1>Registrar Usuarios</h1>
    <form action="registrar_usuarios.php" method="post">
        <input type="text" name="rut" placeholder="Ingrese el rut">
        <input type="password" name="password" placeholder="Ingrese una contraseña">
        <div class="caja">
            <select name="perfil">
                <option value="3">Alumno</option>
                <option value="2">Apoderado</option>
                <option value="1">Profesor</option>
                <option value="0">Administrador</option>
            </select>
        </div>
        <input type="text" name="correo" placeholder="Correo">
        <input type="text" name="primer_nombre" placeholder="Primer Nombre">
        <input type="text" name="segundo_nombre" placeholder="Segundo Nombre">
        <input type="text" name="primer_apellido" placeholder="Primer Apellido">
        <input type="text" name="segundo_apellido" placeholder="Segundo Apellido">
        <input type="submit" value="Registrar">
    </form>
    
</body>
</html>