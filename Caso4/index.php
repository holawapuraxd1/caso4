<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Comprar Productos</title>
    <link href="css/estilo.css" rel="stylesheet">

    <!-- JS IMAGENES -->
    <script>
        function mostrarImagen() {
            const select = document.getElementById("selProducto");
            const imagen = document.getElementById("imagenProducto");
            const producto = select.value;

            imagen.src = "img/" + producto + ".jpg";
            imagen.alt = "Imagen de " + producto;
        }
    </script>


</head>

<body>
    <header>
        <?php include 'encabezado.php'; ?>
    </header>
    <section>
        <?php
        session_start();
        include 'capturaDatos.php';

        $producto = getProducto();
        include 'seleccionaProducto.php';

        ?>
        <form name="frmSeleccion" method="POST" action="canasta.php">
            <table border="1" width="550" cellspacing="10" cellpadding="1">
                <tr>
                    <td width="200">Seleccione un producto</td>
                    <td width="300">
                        <select id="selProducto" name="selProducto" onchange="mostrarImagen()">
                            <option value="p001" <?php echo $selP1; ?>>muñequito</option>
                            <option value="p002" <?php echo $selP2; ?>>Tasita</option>
                            <option value="p003" <?php echo $selP3; ?>>Ramen</option>
                            <option value="p004" <?php echo $selP4; ?>>Pokemon</option>
                            <option value="p005" <?php echo $selP5; ?>>Peluche pokebola</option>
                            <option value="p006" <?php echo $selP6; ?>>Chocolate</option>
                            <option value="p007" <?php echo $selP7; ?>>Collar.</option>
                            <option value="p008" <?php echo $selP8; ?>>Crema</option>
                            <option value="p009" <?php echo $selP9; ?>>Pulcera</option>
                            <option value="p010" <?php echo $selP10; ?>>Reloj </option>
                        </select>
                    </td>
                    <td rowspan="3">
                        <img id="imagenProducto" src="img/p001.jpg" width="120" height="120" alt="Producto Seleccionado" />
                    </td>
                </tr>
                <tr>
                    <td>Cantidad</td>
                    <td>
                        <input type="number" name="txtCantidad" min="1" value="1" />
                    </td>
                    <td></td>
                </tr>
                <tr class="botones">
                    <td>
                        <input class="styled-submit" type="submit" value="Comprar" aria-label="Comprar productos" tabindex="0" />
                    </td>
                </tr>
            </table>
        </form>
    </section>
    <footer>
        <?php include('pie.php'); ?>
    </footer>
</body>

</html>