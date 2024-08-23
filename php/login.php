<?php
include('./conexion.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = false;
    if (!empty($_POST['correo']) && !empty($_POST['contrasena'])) {
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
    }
    //primera consulta de la tabla de usuarios
    $sql = "SELECT * FROM usuarios_datos WHERE correo = '$correo'";
    $prepar = $conexion->prepare($sql);
    $prepar->execute();

    //recorrer la primera tabla
    foreach ($prepar as $correo) {
        if (password_verify($contrasena, $correo['contraseña'])) {
            $login = true;
            $_SESSION['nombre'] = $correo['nombre'];
        }
    }
    // //RECORRER LA SEGUNDA TABLA
    // if (!$login) {
    //     //segunda consulta de la tabla de admins
    //     $sql2 = "SELECT * FROM admins WHERE correo = '$correo'";
    //     $prepar2 = $conexion->prepare($sql2);
    //     $prepar2->execute();
    //     foreach ($prepar2 as $admin) {
    //         if (password_verify($contrasena, $admin['contraseña'])) {
    //             $_SESSION['nombre'] = $admin['nombre'];
    //             header('Location:./admin.php');
    //         }
    //     }
    // }
    if ($login) {
        header('Location: ../html/practica.php');
    } else {
        echo "No existe en la BD";
        echo "<br>";
        echo "<a href='../html/login.html'>VUELVA A INICIAR SESION</a>";
    }
}

?>