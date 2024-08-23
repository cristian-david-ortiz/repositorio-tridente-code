<?php
session_start();
if(!isset($_SESSION['nombre'])){
    header('Location: ./login.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/index.css">
    <!-- <link rel="stylesheet" href="../Styles/assests.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> -->
    <title>GYM</title>
</head>
<body>
    <div class="head">
    <div class="navbar">
        <a href="#home" class="logo">
            <img width="60px" height="50px" src="./img/logo.png" />
        </a>
        <div class="nav-items">
            <a href="">Inicio</a>
            <a href="">Votos</a>
            <a href="">Más Votos</a>
            <a href="./cerrar.php">Cerrar Sesion</a>
        </div>
    </div>
</div>

<header class="content">
        <h2 class="h2">Bienvenido Administrador <?php echo $_SESSION['nombre'] ?></h2>
        <p>Hola Administrador, ¿Que quieres hacer hoy?</p>
        <div class="btn-home">
            <a href="#" class="btn">HACER ALGO</a>
        </div>
    </header>
</body>

<!-- <script>
    function setActive(element) {
        // Eliminar la clase 'active' de todos los elementos
        var links = document.querySelectorAll('.nav-items a');
        links.forEach(function (link) {
            link.classList.remove('active');
        });

        // Añadir la clase 'active' al elemento clicado
        element.classList.add('active');
    }
</script> -->

</html>