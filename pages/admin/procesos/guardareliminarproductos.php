<?php
    echo '<script>window.close(); window.opener.location.reload();</script>';
    // Conexión a base de datos
    require("../../../database/connection.php");

    // Recoger los datos
    $id = $_POST['id'];
	echo $id;
    
	// Eliminar etiquetas relacionadas
	mysqli_query($conexion, "DELETE FROM productos_tags WHERE idProductos=$id");

	// Eliminar Producto
	$eliminar = "DELETE FROM productos WHERE id=$id";
	
	if(!mysqli_query($conexion,$eliminar))
	{
		die('Error');
	}
	// Cerrar la conexión
	mysqli_close($conexion);
?>