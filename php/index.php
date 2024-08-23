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
    <link rel="stylesheet" href="../Styles/assests.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
            <a href="">Servicios</a>
            <a href="">Más</a>
            <a href="./cerrar.php">Cerrar Sesion</a>
        </div>
    </div>
</div>

<header class="content">
        <h2 class="h2">BIENVENID@ <?php echo $_SESSION['nombre'] ?></h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid delectus suscipit amet, doloribus quibusdam et adipisci 
            quisquam impedit mollitia itaque placeat perferendis sunt laudantium debitis odit. Dignissimos id incidunt fuga?</p>
        <div class="btn-home">
            <a href="#" class="btn">Saber Más</a>
        </div>
    </header>

 <!-- <section class="contentsessiion">
    <h2 class="title">Ejemplo3</h2>
<div class="box container">
    <div class="box">
        <i class="fab fa-angular"></i>
        <h2>Mas1</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias er
         unde corporis eaque, iusto incidunt amet tenetur non mollitia. Dolorum, unde!</p>
    </div>
    <div class="box">
        <i class="fab fa-apple"></i>
        <h2>Mas2</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias er
         unde corporis eaque, iusto incidunt amet tenetur non mollitia. Dolorum, unde!</p>
    </div>
    <div class="box">
        <i class="fab fa-android"></i>
        <h2>Mas3</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias er
         unde corporis eaque, iusto incidunt amet tenetur non mollitia. Dolorum, unde!</p>
    </div>
</div>
<a href="#" class="btn">Saber Más</a>
</section> -->
<!--
<section class="content about">
        <h2 class="title">Otros</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae provident nisi voluptates, 
            adipisci quos laborum consectetur!</p>
        
</section>

<section class="content contact">
<h2 class="title">Contacto</h2>
<p>Contactate con nosotros
   <p> Ani Rahn: 370412344</p>
    <p>Josue Rahn: 3704843518</p>
   <p>Matias Ortiz: 370412345</p> 
</p>
<figure><img src="img/thebest.image.jpg" height="220px" width="100%" alt="thebest"></figure>
</section> -->
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