<?php include("topmenu.php"); ?> 
    <!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Productos</title>
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <script type="text/javascript" src="../../script/emergentes.js"></script>
    </head>
    <body>
    <div>
        <div id= "contenido">
            <div class="centrar">
                <a href="../popups.php?type=pi" class="enlace-destino" onclick="openPopup(); return false;">Agregar Nuevo Producto</a>
                <br><br>
            </div>
            <?php
                // Establecer la conexión a la base de datos
                // Conexión a base de datos
                require("../../database/connection.php");

                // Ejecutar la consulta SQL
                $sql = "SELECT id,nombre,descripcion,nomb_marca,precio,cantidad,img FROM productos INNER JOIN marca ON productos.idmarca = marca.idmarca ORDER BY id";
                $resultado = mysqli_query($conexion, $sql);

                // Crear la tabla HTML y mostrar los datos
                echo "<table class='tabladis'>";
                echo "<tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Imagen</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>";
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $fila['id'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['descripcion'] . "</td>";
                    echo "<td>" . $fila['nomb_marca'] . "</td>";
                    echo "<td>$" . $fila['precio'] . ".00</td>";
                    echo "<td>" . $fila['cantidad'] . "</td>";
                    echo "<td><img src='../../media/img/productos/" . $fila['img'] . "' widht=100px height=100px></td>";?>
                    <td>
                        <a href="../popups.php?id=<?php echo $fila['id'];?>&type=pa" onclick="openPopup(); return false;">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="../popups.php?id=<?php echo $fila['id'];?>&type=pe" onclick="openPopup(); return false;">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                    <?php
                }
                echo "</table>";
                //Cierre de la tabla donde se muestran los productos

                // Cerrar la conexión a la base de datos
                mysqli_close($conexion);
            ?>
        </div>
    </div>
    </body>
    <script src="../../script/general.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../script/jquery.flipster.min.js"></script>
</html>