<?php
    require '../db/database.php';
    require '../clases/usuario.php';

    session_start();
    $u = new usuario();
    if (isset($_SESSION['usuario'])) {
    $u = $_SESSION['usuario'];
    if ($u->getPerfil() == 0) {
        header("Location: ../vistas/home_admin.php");
    }elseif($u->getPerfil() == 1){
        header("Location: ../vistas/home_profe.php");
    }elseif($u->getPerfil() == 2){
        header("Location: ../vistas/home_apod.php");
    }elseif($u->getPerfil() == 4){
        header("Location: ../vistas/home_alumn.php");
    }
    
  }


  if (!empty($_POST['rut']) && !empty($_POST['password'])) {
      
    $records = $conn->prepare('SELECT * FROM usuarios WHERE rut = :rut');
    $records->bindParam(':rut', $_POST['rut']);
    
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';


    if (count((array)$results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $u = new usuario();
        
        $u->setId($results['id']);
        $u->setRut($results['rut']);
        $u->setPassword($results['password']);
        $u->setCorreo($results['correo']);
        $u->setPerfil($results['perfil']);
        $u->setNombre($results['primer_nombre']);
        $u->setSegundoNombre($results['segundo_nombre']);
        $u->setPrimerApellido($results['primer_apellido']);
        $u->setSegundoApellido($results['segundo_apellido']);

        $_SESSION['usuario'] = $u;

        if ($u->getPerfil() == 0) {
            header("Location: ../vistas/home_admin.php");
        }elseif ($u->getPerfil() == 1) {
            header("Location: ../vistas/home_profe.php");
        }elseif ($u->getPerfil() == 2) {
            header("Location: ../vistas/home_apod.php");
        }elseif ($u->getPerfil() == 3) {
            header("Location: ../vistas/home_alumn.php");
        }else{
            $message = 'Error';
        }

      
      
    } else {
      $message = 'Rut o contraseña incorrectos';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php 
    require '../parciales/header.php'
    ?>
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Login</h1>
    <form action="login.php" method="post">
        <input type="text" name="rut" placeholder="Ingrese su rut">
        <input type="password" name="password" placeholder="Ingrese su contraseña">
        <input type="submit" value="Iniciar Sesion">
    </form>
</body>
</html>