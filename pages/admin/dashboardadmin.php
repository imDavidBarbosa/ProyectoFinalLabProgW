<?php include("topmenu.php"); ?> 
    <!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Pedidos</title>
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <script type="text/javascript" src="../../script/emergentes.js"></script>
    </head>
    <body>
        <div id= "contenido">
        <?php
            // Establecer la conexión a la base de datos
            // Conexión a base de datos
            require("../../database/connection.php");

            // Ejecutar la consulta SQL
            $sql = "SELECT idventa,fecha,idcliente,ventas.idestatus, descestatus FROM ventas INNER JOIN estatus ON estatus.idestatus = ventas.idestatus ORDER BY fecha";
            $resultado = mysqli_query($conexion, $sql);

            // Crear la tabla HTML y mostrar los datos
            echo "<table class='tabladis'>";
            echo "<tr>
                <th>ID Venta</th>
                <th>Fecha</th>
                <th>ID cliente</th>
                <th>ID Estatus</th>
                <th>Detalles</th>
                <th>Actualizar Estado</th>
            </tr>";
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila['idventa'] . "</td>";
                echo "<td>" . $fila['fecha'] . "</td>";
                echo "<td>" . $fila['idcliente'] . "</td>";
                echo "<td>" . $fila['descestatus'] . "</td>";
                ?>
                <td>
                    <a href="../popups.php?id=<?php echo $fila['idventa'];?>&type=detalles" onclick="openPopup(); return false;">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </td>
                <td>
                    <a href="../popups.php?id=<?php echo $fila['idventa'];?>&type=actestado" onclick="openPopup(); return false;">
                    <i class="fa-solid fa-pen-to-square"></i></i>
                    </a>
                </td>
                <?php
            }
            echo "</table>";
            // Cierre de la tabla donde se muestran los productos

            // Cerrar la conexión a la base de datos
            mysqli_close($conexion);
            ?>
        </div>
    </body>
    <script src="../../script/general.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../script/jquery.flipster.min.js"></script>
</html>