<?php
    echo '<script>window.close(); window.opener.location.reload();</script>';
    // Conexión a base de datos
    require("../../../database/connection.php");

    // Recoger los datos
    $id = $_POST['id'];
	
	// Eliminar Usuario
	$eliminar = "DELETE FROM usuarios WHERE iduser=$id";
	
	if(!mysqli_query($conexion,$eliminar))
	{
		die('Error');
	}
	// Cerrar la conexión
	mysqli_close($conexion);
?>