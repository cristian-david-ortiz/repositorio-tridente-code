<?php
include('../php/conexion.php');
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    // VERIFICAR SI EL CORREO Y CONTRASEÑA EXISTEN YA EN LA DB 
    $login = false;
    $sql = "SELECT * FROM admins WHERE correo = :correo";
    $prepar = $conexion->prepare($sql);
    $prepar->bindParam(':correo', $correo);
    $prepar->execute();

    foreach ($prepar as $row) {
        if (password_verify($contrasena, $row['contraseña'])) {
            $login = true;
            break;
        }
    }

    if ($login) {
        echo "El correo y contraseña ya son existentes. Por favor intente nuevamente";
        echo "<br>";
        echo "<a href='../html/register.html'>VOLVER</a>";
    } else {
        if (!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['contrasena']) && !empty($_POST['nivel'])) {
            $nombre = $_POST['nombre'];
            // Encriptar contraseña 
            $contrasenaEncrip = password_hash($contrasena, PASSWORD_DEFAULT);
            $nivel = $_POST['nivel'];

            // INSERTAR
            $insert = "INSERT INTO admins(nombre, correo, contraseña, nivel) 
                    VALUES (:nombre, :correo, :contrasenaEncrip, :nivel)";

            $stmt = $conexion->prepare($insert);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':contrasenaEncrip', $contrasenaEncrip);
            $stmt->bindParam(':nivel', $nivel);

            if ($stmt->execute()) {
                // REDIRIGE AL LOGIN PARA QUE INICIE SESION
                header('Location: ../html/login.html');
                exit(); // Asegúrate de detener la ejecución después de la redirección
            } else {
                echo "Error al insertar los datos. Por favor intente nuevamente.";
            }
        }
    }
}
?>