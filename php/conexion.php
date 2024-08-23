<?php
$host = "localhost";
$bd = "usuarios";
$correo = "root";
$contrasenia = "";

try {

    $conexion = new PDO("mysql:host=$host;dbname=$bd", $correo, $contrasenia);

}
catch (Exception $ex){
    echo $ex;
}
?>