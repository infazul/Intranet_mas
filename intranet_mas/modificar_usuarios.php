<?php 
    require 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="modificar_usuarios.php" method="post">
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
        <input type="submit" value="Guardar">
    </form>

</body>
</html>


