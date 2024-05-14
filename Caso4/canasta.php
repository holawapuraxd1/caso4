<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Canasta de Compras</title>
    <link href="estilo.css" rel="stylesheet">
    <style>
        /* Estilos adicionales para una mejor presentación */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }

        header, footer {
            text-align: center;
            margin-bottom: 20px;
        }

        section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            text-align: center;
            padding: 10px;
            border: 1px solid #cccccc;
        }

        img {
            border-radius: 5px;
        }

        #derecha {
            text-align: right;
        }

        #centrado {
            text-align: center;
        }

        #resaltado {
            font-weight: bold;
        }

        #totales {
            font-weight: bold;
            color: #333;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
        }

        a:hover {
            color: #45a049;
        }
    </style>
</head>

<body>
    <header>
        <?php include('encabezado.php'); ?>
    </header>
    <section>
        <table>
            <tr>
                <td colspan="5">
                    <img src="descarga.jpeg" width="80" height="80" alt="Carrito de Compras luffy" />
                </td>
            </tr>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
            <?php
            session_start();
            include('asignaciones.php');

            // Asegúrate de que la sesión tenga el array 'productos'
            if (!isset($_SESSION['productos'])) {
                $_SESSION['productos'] = [];
            }

            $productos = $_SESSION['productos'];
            $total = 0;
            $bandera = false;
            
            // Obtener datos del formulario
            include('capturaDatos.php');
            $codigo = getProducto();
            $cantidad = getCantidad();

            if (!array_key_exists($codigo, $productos)) {
                $productos[$codigo] = $cantidad;
            } else {
                $productos[$codigo] += $cantidad;
                $bandera = true;
            }

            $_SESSION['productos'] = $productos; 

            $tSubtotal = 0;

            foreach ($productos as $cod => $cant) {
                $precio = asignaPrecio($cod) ?? 0; // Use 0 if the price is NULL
                $subtotal = $cant * $precio;
                $tSubtotal += $subtotal;
                ?>
                <tr>
                    <td id="centrado"><?php echo htmlspecialchars($cod); ?></td>
                    <td><?php echo htmlspecialchars(muestraDescripcion($cod)); ?></td>
                    <td id="derecha">
                        <?php echo '$' . number_format($precio, 2); ?>
                    </td>
                    <td id="centrado"><?php echo htmlspecialchars($cant); ?></td>
                    <td id="derecha"><?php echo '$' . number_format($subtotal, 2); ?></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td id="resaltado">Total a Pagar</td>
                <td></td>
                <td></td>
                <td></td>
                <td id="totales"><?php echo '$' . number_format($tSubtotal, 2); ?></td>
            </tr>
            <tr>
                <td colspan="3">
                    <a href="index.php">Seguir comprando..!!</a>
                </td>
                <td colspan="2">
                    <a href="destruir.php">Finalizar la compra</a>
                </td>
            </tr>
        </table>
    </section> 
    <footer>
        <?php include('pie.php'); ?>
    </footer>
</body>

</html>