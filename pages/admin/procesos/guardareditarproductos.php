<?php
    echo '<script>window.close(); window.opener.location.reload();</script>';
    // Conexión a base de datos
    require("../../../database/connection.php");

    // Valores actualizados en el formulario
    $id = $_POST['id'];
    $Nombre = $_POST['nombre'];
    $Descripcion = $_POST['descripcion'];
    $Idmarca = $_POST['marca'];
    $Precio = $_POST['precio'];
    $Cantidad = $_POST['cantidad'];
    
     // Procesar la imagen
     if($_FILES["img"]["error"] == 0) { // Si se ha cargado una nueva imagen
        $ImgName = $_FILES['img']['name'];
        $ImgTmpName = $_FILES['img']['tmp_name'];
        $ImgSize = $_FILES['img']['size'];
        $ImgType = $_FILES['img']['type'];
        $ImgExt = strtolower(pathinfo($ImgName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

        if(in_array($ImgExt, $allowedExtensions)) { // Si la extensión es permitida
            $ImgPath = '../../../media/img/productos/'.$ImgName;
            move_uploaded_file($ImgTmpName, $ImgPath); // Mover la imagen a la carpeta productos
        } else {
            die('Tipo de archivo no permitido');
        }
    } else { // Si no se ha cargado una nueva imagen, mantener la anterior
        $stmt = mysqli_prepare($conexion, "SELECT img FROM productos WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $fila=mysqli_fetch_array($resultado);
        $ImgName = $fila['img'];
    }

    // Modificar Producto
    $actualizar = "UPDATE productos 
    SET nombre = '$Nombre', descripcion = '$Descripcion', idmarca = '$Idmarca', precio = '$Precio', cantidad = '$Cantidad', img = '$ImgName' 
    WHERE id = $id";
    if(!mysqli_query($conexion,$actualizar))
    {
        die('Error');
    }

    // Guardar y eliminar etiquetas
        // Guardar una nueva etiqueta
    $querypt = mysqli_query($conexion, "SELECT idtags FROM productos_tags WHERE idProductos = $id");
    $tagsact = array();
    while($acttags = mysqli_fetch_row($querypt)) {
        $tagsact[] = implode("",$acttags);
    }
    $queryt = mysqli_query($conexion, "SELECT * FROM tags"); 
    $i = 0;
    while($tagsrows = mysqli_fetch_array($queryt)){
        $i++;
        if(isset($_POST["tag$i"])) {
            $a = $_POST["tag$i"];
            if(count($tagsact) > 0){
                for($z = 0; $z < count($tagsact); $z++){
                    if(array_search($a, $tagsact) === false) {
                        mysqli_query($conexion, "INSERT INTO productos_tags VALUES($id, $a)");
                        break;
                    }
                }
            } else if(count($tagsact) == 0) {
                mysqli_query($conexion, "INSERT INTO productos_tags VALUES($id, $a)");
            }
        }
    }
        // Eliminar etiqueta
    $queryt2 = mysqli_query($conexion, "SELECT * FROM tags"); 
    $newtags = array();
    $i = 0;
    while($tagrows = mysqli_fetch_row($queryt2)) {
        $i++;
        if(isset($_POST["tag$i"])) { 
            $newtags[] = $_POST["tag$i"];
        }
    }
    $old = array_diff($tagsact, $newtags);
    foreach($old as $o) {                  
        mysqli_query($conexion, "DELETE FROM productos_tags WHERE idProductos = $id AND idtags = $o");
    }


    // Cerrar la conexión
    mysqli_close($conexion);
?>