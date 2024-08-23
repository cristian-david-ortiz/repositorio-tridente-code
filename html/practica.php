<?php
// Configuración de la base de datos
$host = 'localhost';
$dbname = 'usuarios';  // Cambiado a 'usuarios' en lugar de 'user'
$username = 'root';
$password = '';

try {
    // Conexión a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 1. Obtener los productos, conteo de tiendas y rangos de precios
    $sql = "SELECT p.nombre AS producto, COUNT(DISTINCT t.ID) AS cantidad_tiendas, 
            MIN(pr.precio) AS precio_minimo, MAX(pr.precio) AS precio_maximo
            FROM productos p
            JOIN precios pr ON p.ID = pr.id_producto
            JOIN tienda t ON pr.id_tienda = t.ID
            GROUP BY p.nombre";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 2. Contador para precios más bajos por tienda
    $sql = "SELECT t.nombre AS tienda, COUNT(*) AS precios_mas_bajos
            FROM precios pr
            JOIN productos p ON pr.id_producto = p.ID
            JOIN tienda t ON pr.id_tienda = t.ID
            WHERE pr.precio = (
                SELECT MIN(pr2.precio)
                FROM precios pr2
                JOIN productos p2 ON pr2.id_producto = p2.ID
                WHERE p.ID = p2.ID
            )
            GROUP BY t.nombre";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $precios_mas_bajos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Preparar los datos para los gráficos
    $tiendas_comparadas = [];
    $rangos_precios = [];
    $conteo_precios_bajos = [];

    foreach ($productos as $producto) {
        $tiendas_comparadas[$producto['producto']] = $producto['cantidad_tiendas'];
        $rangos_precios[$producto['producto']] = [$producto['precio_minimo'], $producto['precio_maximo']];
    }

    foreach ($precios_mas_bajos as $tienda) {
        $conteo_precios_bajos[$tienda['tienda']] = $tienda['precios_mas_bajos'];
    }

    $max_tiendas = max($tiendas_comparadas);
    $max_precios_bajos = max($conteo_precios_bajos);

} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficos de Barras</title>
    <style>
        .grafico {
            width: 50%;
            margin: auto;
            padding: 20px;
            text-align: center;
        }

        .barra {
            display: block;
            height: 20px;
            background-color: #4CAF50;
            margin: 10px 0;
            color: white;
            text-align: right;
            padding-right: 10px;
        }

        .etiqueta {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .rango-barra {
            background-color: #FFA500;
            padding: 3px;
            margin: 5px 0;
        }
    </style>
</head>
<body>

<div class="grafico">
    <h2>Cantidad de Tiendas Comparadas</h2>
    <?php foreach ($tiendas_comparadas as $producto => $cantidad): ?>
        <div class="etiqueta"><?= htmlspecialchars($producto) ?></div>
        <div class="barra" style="width: <?= ($cantidad / $max_tiendas) * 100 ?>%;">
            <?= htmlspecialchars($cantidad) ?> tiendas
        </div>
    <?php endforeach; ?>
</div>

<div class="grafico">
    <h2>Rangos de Precios (USD)</h2>
    <?php foreach ($rangos_precios as $producto => $rango): ?>
        <div class="etiqueta"><?= htmlspecialchars($producto) ?></div>
        <div class="rango-barra">
            $<?= number_format($rango[0], 2) ?> - $<?= number_format($rango[1], 2) ?>
        </div>
    <?php endforeach; ?>
</div>

<div class="grafico">
    <h2>Cantidad de Precios Más Bajos por Tienda</h2>
    <?php foreach ($conteo_precios_bajos as $tienda => $cantidad): ?>
        <div class="etiqueta"><?= htmlspecialchars($tienda) ?></div>
        <div class="barra" style="width: <?= ($cantidad / $max_precios_bajos) * 100 ?>%;">
            <?= htmlspecialchars($cantidad) ?> precios más bajos
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
