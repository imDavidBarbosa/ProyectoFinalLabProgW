<?php 
    session_start();
    include("../../database/connection.php");
    $counter = 1;
    // Guardar Venta General
    $date = getdate();
    $sql = ("INSERT INTO ventas (fecha, idcliente, idestatus) VALUES(curdate(), $_SESSION[userid], 1)");
    $query = mysqli_query($conexion, $sql);
    // Guardar detalles de venta
    $sql1 = ("SELECT MAX(idventa) as lastventa FROM ventas");
    $query1 = mysqli_query($conexion, $sql1);
    $lastid = implode("", mysqli_fetch_row($query1));
    while ($counter <= $_SESSION['carritoprods']) {
        if(isset($_COOKIE["$counter"])) {
            $prods = unserialize($_COOKIE["$counter"]);
            $sql2 = ("SELECT nombre, precio FROM productos WHERE id = $prods[0]");
            $query2 = mysqli_query($conexion, $sql2);
            $fila =  mysqli_fetch_array($query2);
            $ptot = $prods[1]*$fila['precio'];
            $sql3 = ("INSERT INTO ventas_detalles VALUES ($lastid, $prods[0], '$fila[nombre]' ,$prods[1], $ptot)");
            $query3 = mysqli_query($conexion, $sql3);
            unset($fila);
            setcookie($counter, "", time()-3600);
        }
        $counter++;
    }
    $_SESSION['carritoprods'] = 0;  
    header("Location: ../productos.php");
?>