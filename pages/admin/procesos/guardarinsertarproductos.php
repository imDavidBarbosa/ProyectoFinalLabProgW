<?php
    echo '<script>window.close(); window.opener.location.reload();</script>';
    // Conexión a base de datos
    require("../../../database/connection.php");

    $Nombre = $_POST['nombre'];
    $Descripcion = $_POST['descripcion'];
    $Idmarca = $_POST['marca'];
    $Precio = $_POST['precio'];
    $Cantidad = $_POST['cantidad'];

    // Verificar si se ha enviado un archivo
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $img_nombre = $_FILES['img']['name'];
        $img_tmp = $_FILES['img']['tmp_name'];
        $img_tamano = $_FILES['img']['size'];
        $img_tipo = $_FILES['img']['type'];
        
        // Comprobar que el archivo subido es una imagen
        $img_extension = strtolower(pathinfo($img_nombre, PATHINFO_EXTENSION));
        if ($img_extension != "jpg" && $img_extension != "jpeg" && $img_extension != "png" && $img_extension != "webp") {
            die("El archivo subido no es una imagen.");
        }
        
        // Guardar la imagen en una carpeta
        $carpeta_destino = "../../../media/img/productos/";
        $img_destino = $carpeta_destino . $img_nombre;
        move_uploaded_file($img_tmp, $img_destino);
        
        // Guardar el nombre de la imagen en la base de datos
        $insertar = "INSERT INTO productos (nombre, descripcion, idmarca, precio, cantidad, img) VALUES ('$Nombre', '$Descripcion', '$Idmarca', $Precio, $Cantidad, '$img_nombre')";
        if(!mysqli_query($conexion,$insertar)) {
            die('Error');
        }
        // Guardar etiquetas 
        $queryid = mysqli_query($conexion, "SELECT MAX(id) as lastid FROM productos");
        $rowid = mysqli_fetch_row($queryid);
        $id = implode("", $rowid);
        $queryt = mysqli_query($conexion, "SELECT * FROM tags"); 
        $i = 0;
        while($tagsrows = mysqli_fetch_array($queryt)){
            $i++;
            if(isset($_POST["tag$i"])) {
                $a = $_POST["tag$i"];
                mysqli_query($conexion, "INSERT INTO productos_tags VALUES($id, $a)");
            }
        }

   
    }

    // Cerramos la conexión
    mysqli_close($conexion);
?>