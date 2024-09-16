<?php
// Configuración de la base de datos
$host = 'localhost';
$dbname = 'usuarios';  // Cambiado a 'usuarios' en lugar de 'user'
$username = 'root';
$password = '';

try { 
    // Conexión a la base de datos usando PDO
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configurar el manejo de errores de PDO
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}

// Consulta SQL para obtener los datos de tiendas, productos y precios
$sql = "SELECT 
            tienda.nombre AS tienda_nombre, 
            productos.nombre AS producto_nombre, 
            precios.precio 
        FROM 
            precios 
        INNER JOIN tienda ON precios.id_tienda = tienda.ID 
        INNER JOIN productos ON precios.id_producto = productos.ID
        ORDER BY producto_nombre, tienda_nombre";

try {
    $statement = $conexion->prepare($sql);
    $statement->execute();
    $resultados = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error en la consulta: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/index.css">
    <link rel="stylesheet" href="../Styles/assests.min.css">
    <title>Supermercados</title>
   </head>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: Arial, sans-serif;
            background: #ffff;
            margin-top: 125px;

        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #ffff;
        }
    </style>
</head>
<body>
<div class="navbar">
        <a href="#home" class="logo">
            <img width="50px" height="50px" src="../img/apa.png" />
        </a>
        <div class="nav-items">
            <a href="#home" class="active" onclick="setActive(this);">Inicio</a>
            <a href="./grafica.php" onclick="setActive(this);">Grafica</a>
            <a href="../php/cerrar.php">Cerrar Sesion</a>
        </div>
    </div>
    
<table>

    <thead>
        <tr>
            <th>Producto</th>
            <th>Tienda</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($resultados)) {
            foreach ($resultados as $fila) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($fila['producto_nombre']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['tienda_nombre']) . "</td>";
                echo "<td>$" . number_format($fila['precio'], 2) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No hay datos disponibles</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>

<?php
// Cerrar la conexión (opcional con PDO)
$conexion = null;
?>
