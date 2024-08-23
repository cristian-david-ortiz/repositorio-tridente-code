<?php
include('./conexion.php');
session_start();  // Iniciar sesión para poder guardar datos de sesión si es necesario

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
   $correo = $_POST['correo'];
   $contrasena = $_POST['contrasena'];

   // Verificar si el correo ya existe en la base de datos
   $login = false;
   $sql = "SELECT * FROM usuarios_datos WHERE correo = :correo";
   $prepar = $conexion->prepare($sql);
   $prepar->bindParam(':correo', $correo);
   $prepar->execute();

   $usuario = $prepar->fetch(PDO::FETCH_ASSOC);  // Obtener un solo registro

   if ($usuario && password_verify($contrasena, $usuario['contraseña'])) {
      $login = true;
   }

   if ($login) {
      echo "El correo y contraseña ya son existentes<br>. Por favor intente nuevamente";
      echo "<br>";
      echo "<a href='../html/register.html'>VOLVER</a>";
   } else {
      if (
         !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['correo'])
         && !empty($_POST['contrasena'])
      ) {
         $nombre = $_POST['nombre'];
         $apellido = $_POST['apellido'];
         // Encriptar contraseña 
         $contrasenaEncrip = password_hash($contrasena, PASSWORD_DEFAULT);
         $domicilio = isset($_POST['domicilio']) ? $_POST['domicilio'] : null;

         // INSERTAR
         $insert = "INSERT INTO usuarios_datos(nombre, apellido, domicilio, correo, contraseña) 
                     VALUES (:nombre, :apellido, :domicilio, :correo, :contrasena)";
         $stmt = $conexion->prepare($insert);
         $stmt->bindParam(':nombre', $nombre);
         $stmt->bindParam(':apellido', $apellido);
         $stmt->bindParam(':domicilio', $domicilio);
         $stmt->bindParam(':correo', $correo);
         $stmt->bindParam(':contrasena', $contrasenaEncrip);

         if ($stmt->execute()) {
            // Redirigir al login para que inicie sesión
            header('Location: ../html/login.html');
            exit();
         } else {
            echo "Error al registrar el usuario. Por favor, intente nuevamente.";
         }
      } else {
         echo "Todos los campos son obligatorios. Por favor, complete todos los datos.";
      }
   }
}
?>