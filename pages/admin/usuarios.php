<?php include("topmenu.php"); ?> 
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Usuarios</title>
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <script type="text/javascript" src="../../script/emergentes.js"></script>
    </head>
    <body>
    <div>
    <div id="contenido">
    <div class="centrar">
        <a href="../popups.php?type=ui" class="enlace-destino" onclick="openPopup(); return false;">Agregar Nuevo Usuario</a>
        <br><br>
    </div>
    <?php
        // Conexión a base de datos
        require("../../database/connection.php");
        // Ejecutar la consulta SQL
        $sql = "SELECT iduser, nombre_com, nombre_user, correo, telefono, roll FROM usuarios";
        $resultado = mysqli_query($conexion, $sql);

        // Crear la tabla HTML y mostrar los datos
        echo "<table class='tabladis'>";
        echo "<tr>
            <th>ID</th>
            <th>Nombre Completo</th>
            <th>Usuario</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Rol</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>";
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $fila['iduser'] . "</td>";
            echo "<td>" . $fila['nombre_com'] . "</td>";
            echo "<td>" . $fila['nombre_user'] . "</td>";
            echo "<td>" . $fila['correo'] . "</td>";
            echo "<td>" . $fila['telefono'] . "</td>";
            echo "<td>" . $fila['roll'] . "</td>";?>
            
            <td>
                <a href="../popups.php?id=<?php echo $fila['iduser'];?>&type=ua" onclick="openPopup(); return false;">
                <i class="fa-solid fa-pen-to-square"></i></a>
            </td>
            <td>
                <a href="../popups.php?id=<?php echo $fila['iduser'];?>&type=ue" onclick="openPopup(); return false;">
                <i class="fa-solid fa-trash"></i></a>
            </td>
            <?php
        }
        echo "</table>";
        //Cierre de la tabla donde se muestran los usuarios

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