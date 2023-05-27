<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <?php 
          session_start();
          $t = $_GET['type'];
          switch($t)  {
            case "ui":
              echo '<title>Insertar Usuario</title>';
              break;
              
            case "ua":
              echo '<title>Editar Usuario</title>';
              break;

            case "ue": 
              echo '<title>Eliminar Usuario</title>';
              break;

            case "pi":
              echo '<title>Insertar Producto</title>';
              break;
  
            case "pa":
              echo '<title>Editar Producto</title>';
              break;
  
            case "pe": 
              echo '<title>Eliminar Producto</title>';
              break;

            case "detalles":
              echo '<title>Productos del Pedido</title>';
              break;
          }

          switch($t)  {
            case "detalles":
              echo '<link rel="stylesheet" href="admin/css/estilos.css">';
              echo '<link rel="stylesheet" href="../css/media.css">';
              echo '<script type="text/javascript" src="../script/emergentes.js"></script>';
              break;

            default:
              echo '<link rel="stylesheet" type="text/css" href="admin/css/estilos.css">';
              echo '<link rel="stylesheet" href="admin/css/estiloform.css">';
              echo '<script type="text/javascript" src="../script/emergentes.js"></script>';
              break;
          }
        ?>
    </head>
    <body>
        <div id= "contenid">
        <?php 
          require("../database/connection.php");
          switch($t) {
            case "ui":
              echo "<h1><center><font size= 6px  color='purple' face='Century Gothic'>Insertar Usuarios</font></center></h1>";
 
              echo "<form action='admin/procesos/guardarinsertarusuarios.php' method='post'>";
              echo "<label for='nombre'>Nombre Completo:</label>";
              echo "<input type='text' required name='nombre'>";
      
              echo "<label for='usuario'>Nombre de Usuario:</label>";
              echo "<input type='text' required name='usuario'>";
      
              echo "<label for='correo'>Correo:</label>";
              echo "<input type='correo' required name='correo'>";
      
              echo "<label for='password'>Contraseña:</label>";
              echo "<input type='password' required name='pass'>";
      
              echo "<label for='telefono'>Telefono:</label>";
              echo "<input type='tel' required name='telefono'>";
      
              echo "<label for='rol'>Rol:</label>";
              echo "<select name='rol' id='rol'>";
              echo"<option value='1'>Administrador</option>";
              echo"<option value='2'>Cliente</option>";
              echo "</select>";
      
              echo "<input type='submit' value='Enviar'>";
              echo "</form>";
              
              // Cerramos la conexión
              mysqli_close($conexion);
              break;

            case "ua":
              if (isset($_GET["id"]))
              {
                $id = $_GET["id"]; 
              }
      
              //Recoger el id que se selecciono
              $resultado = mysqli_query($conexion,"SELECT * FROM usuarios WHERE iduser = $id");
      
              $fila=mysqli_fetch_array($resultado);
              
              $NombreCompleto = $fila['nombre_com'];
              $Usuario = $fila['nombre_user'];
              $Correo = $fila['correo'];
              $Tel = $fila['telefono'];
              $Rol = $fila['roll'];
      
              // Título Formulario
              echo "<h1><center><font size= 6px  color='purple' face='Century Gothic'>Editar Usuarios</font></center></h1>";
              
              echo "<form action='admin/procesos/guardareditarusuarios.php' method='post'>";
              echo "<input type='hidden' id='id' value='$id' name='id'>";
              echo "<label for='nombre'>Nombre:</label>";
              echo "<input type='text' id='nombre' value='$NombreCompleto' name='nombre'>";
      
              echo "<label for='usuario'>Usuario:</label>";
              echo "<input type='text' id='usuario' value='$Usuario' name='usuario'>";
      
              echo "<label for='correo'>Correo:</label>";
              echo "<input type='correo' id='correo' value='$Correo' name='correo'>";
      
              echo "<label for='telefono'>Telefono:</label>";
              echo "<input type='tel' id='telefono' value='$Tel' name='telefono'>";

              echo "<label for='rol'>Rol:</label>";
              echo "<select name='rol' id='rol'>";
              if($Rol == 1){
                  echo"<option value='1' selected='selected'>Administrador</option>";
                  echo"<option value='2'>Cliente</option>";
              } else {
                  echo"<option value='1'>Administrador</option>";
                  echo"<option value='2' selected='selected'>Cliente</option>";
              }
              echo "</select>";
      
              echo "<input type='submit' value='Enviar'>";
              echo "</form>";
              // Cerramos la conexión
              mysqli_close($conexion);
              break;

            case "ue":
              if (isset($_GET["id"])) {
                $id = $_GET["id"]; 
              }
          
              //Recoger el id que se selecciono
              $resultado = mysqli_query($conexion,"SELECT * FROM usuarios WHERE iduser = $id");
      
              $fila=mysqli_fetch_array($resultado);
              
              $NombreCompleto = $fila['nombre_com'];
              $Usuario = $fila['nombre_user'];
              $Correo = $fila['correo'];
              $Tel = $fila['telefono'];
              $Rol = $fila['roll'];
      
              // Título Formulario
              echo "<h1><center><font size= 6px  color='purple' face='Century Gothic'>Eliminar Usuario</font></center></h1>";
       
              echo "<form action='admin/procesos/guardareliminarusuarios.php' method='post'>";
              echo "<input type='hidden' id='id' value = $id name='id'>";
              echo "<label for='nombre'>Nombre:</label>";
              echo "<input type='text' readonly id='nombre' value = '$NombreCompleto' name='nombre'>";
      
              echo "<label for='usuario'>Usuario:</label>";
              echo "<input type='text' readonly id='usuario' value = '$Usuario' name='usuario'>";
      
              echo "<label for='correo'>Correo:</label>";
              echo "<input type='correo' readonly id='correo' value = '$Correo' name='correo'>";

              echo "<label for='telefono'>Telefono:</label>";
              echo "<input type='tel' readonly id='telefono' value = '$Tel' name='telefono'>";
      
              echo "<label for='rol'>Rol:</label>";
              echo "<input type='text' readonly id='rol' value = '$Rol' name='rol'>";
      
              echo "<label for='pregunta'>¿Seguro que desea eliminar este usuario?</label>";
              echo "<input type='submit' value='Aceptar'>   ";
              echo "<input type='submit' id='cancelar' value='Cancelar'>";
              echo "</form>";
              
              // Cerramos la conexión
              mysqli_close($conexion);
              break;

            case "pi":
              // Título Formulario
              echo "<h1><center><font size= 6px  color='purple' face='Century Gothic'>Insertar Producto</font></center></h1>";

              echo "<form action='admin/procesos/guardarinsertarproductos.php' method='post' enctype='multipart/form-data'>";
              echo "<label for='nombre'>Nombre:</label>";
              echo "<input type='text' id='nombre' name='nombre' required>";

              echo "<label for='descripcion'>Descripcion:</label>";
              echo "<input type='text' id='descripcion' name='descripcion' required>";


              echo "<label>Etiquetas:</label>";
              $query = mysqli_query($conexion,"SELECT * FROM tags");
              $numtag = 1;
              while($rows = mysqli_fetch_array($query)) {
                  $idtag = $rows['idtags'];
                  $tagname = $rows['nombre_tag'];
                  echo "<div class='tagcontain'>";
                  echo "<input type='checkbox' id='tag$numtag' name='tag$numtag' value='$idtag'>";
                  echo "<label class='tags' for='tag$numtag'>$tagname</label>";
                  echo "</div>";
                  $numtag++;
              }

              echo "<label for='marca'>Marca:</label>";
              echo "<select name='marca' id='marca'>";
              echo"<option value='1'>JAFRA</option>";
              echo"<option value='2'>Yves Rocher</option>";

              echo "</select>";

              echo "<label for='precio'>Precio:</label>";
              echo "<input type='text' id='precio' name='precio' required>";

              echo "<label for='cantidad'>Cantidad:</label>";
              echo "<input type='text' id='cantidad' name='cantidad' required>";

              echo "<label for='img'>Imagen:</label>";
              echo "<input type='file' id='img' name='img'>";

              echo "<p><input type='submit' value='Agregar'>";
              echo "</form>";

              // Cerramos la conexión
              mysqli_close($conexion);
              break;
            case "pa":
              if (isset($_GET["id"])) {
                  $id = $_GET["id"]; 
              }
          
              //Recoger el id que se selecciono
              $resultado = mysqli_query($conexion,"SELECT * FROM (productos INNER JOIN marca ON productos.idmarca = marca.idmarca) WHERE id = $id");
      
              $fila=mysqli_fetch_array($resultado);
              
              $Nombre = $fila['nombre'];
              $Descripcion = $fila['descripcion'];
              //$Etiquetas = $fila['tags'];
              $Marca = $fila['nomb_marca'];
              $Idmarca = $fila['idmarca'];
              $Precio = $fila['precio'];
              $Cantidad = $fila['cantidad'];
              $ImgName = $fila['img'];
      
              // Título Formulario
              echo "<h1><center><font size= 6px  color='purple' face='Century Gothic'>Editar Productos</font></center></h1>";
              
              echo "<form action='admin/procesos/guardareditarproductos.php' method='post' enctype='multipart/form-data'>";
              echo "<input type='hidden' id='id' value='$id' name='id'>";
              echo "<label for='nombre'>Nombre:</label>";
              echo "<input type='text' id='nombre' value='$Nombre' name='nombre'>";
      
              echo "<label for='descripcion'>Descripcion:</label>";
              echo "<input type='text' id='descripcion' value='$Descripcion' name='descripcion'>";
      
              echo "<label>Etiquetas:</label>";
              $query2 = mysqli_query($conexion,"SELECT idtags FROM productos_tags WHERE idProductos = $id");
              $tagsP = array();
              while(($fila = mysqli_fetch_row($query2))){
                  $tagsP[] = implode("", $fila);
              }
              $query = mysqli_query($conexion,"SELECT * FROM tags ORDER BY nombre_tag");
              $numtag = 1;
              while($rows = mysqli_fetch_array($query)) {
                  $idtag = $rows['idtags'];
                  $tagname = $rows['nombre_tag'];
                  for($j = 0; $j < count($tagsP); $j++) {
                      if($tagsP[$j] == $idtag) {
                          echo "<div class='tagcontain'>";
                          echo "<input type='checkbox' id='tag$numtag' name='tag$numtag' value='$idtag' checked='checked'>";
                          echo "<label class='tags' for='tag$numtag'>$tagname</label>";
                          echo "</div>";
                          $numtag++;
                          continue 2;
                      }
                  }
                  echo "<div class='tagcontain'>";
                  echo "<input type='checkbox' id='tag$numtag' name='tag$numtag' value='$idtag'>";
                  echo "<label class='tags' for='tag$numtag'>$tagname</label>";
                  echo "</div>";
                  $numtag++;
              }
      
              echo "<label for='marca'>Marca:</label>";
              echo "<select name='marca' id='marca'>";
              if($Idmarca == 1){
                  echo"<option value='1' selected='selected'>JAFRA</option>";
                  echo"<option value='2'>Yves Rocher</option>";
              } else {
                  echo"<option value='1'>JAFRA</option>";
                  echo"<option value='2' selected='selected'>Yves Rocher</option>";
              }
              echo "</select>";
      
              echo "<label for='precio'>Precio:</label>";
              echo "<input type='text' id='precio' value='$Precio' name='precio'>";
      
              echo "<label for='cantidad'>Cantidad:</label>";
              echo "<input type='text' id='cantidad' value='$Cantidad' name='cantidad'>";
      
              echo "<label for='img'>Imagen:</label>";
              echo "<input type='file' id='img' name='img'>";
      
              echo "<p><input type='submit' value='Enviar'>";
              echo "</form>";
              // Cerramos la conexión
              mysqli_close($conexion);
              break;
            case "pe":
              if (isset($_GET["id"])) {
                $id = $_GET["id"]; 
              }
              //Recoger el id que se selecciono
              $resultado = mysqli_query($conexion,"SELECT * FROM productos WHERE id = $id");
      
              $fila=mysqli_fetch_array($resultado);
              
              $Nombre = $fila['nombre'];
              $Descripcion = $fila['descripcion'];
              $Precio = $fila['precio'];
              $Cantidad = $fila['cantidad'];
              $ImgName = $fila['img'];
      
              // Título Formulario
              echo "<h1><center><font size= 6px  color='purple' face='Century Gothic'>Eliminar Productos</font></center></h1>";
       
              echo "<form action='admin/procesos/guardareliminarproductos.php' method='post'>";
              echo "<input type='hidden' id='id' value = $id name='id'>";
              echo "<label for='nombre'>Nombre:</label>";
              echo "<input type='text' readonly id='nombre' value = '$Nombre' name='nombre'>";
      
              echo "<label for='descripcion'>Descripcion:</label>";
              echo "<input type='text' readonly id='descripcion' value = '$Descripcion' name='descripcion'>";
      
              echo "<label for='precio'>Precio:</label>";
              echo "<input type='text' readonly id='precio' value = '$Precio' name='precio'>";
      
              echo "<label for='cantidad'>Cantidad:</label>";
              echo "<input type='text' readonly id='cantidad' value = '$Cantidad' name='cantidad'>";
      
              echo "<label for='img'>Nombre de la imagen:</label>";
              echo "<input type='text' readonly id='img' value = '$ImgName' name='img'>";
      
              echo "<label for='pregunta'>¿Seguro que desea eliminar este producto?</label>";
              echo "<input type='submit' value='Aceptar'>   ";
              echo "<input type='submit' id='cancelar' value='Cancelar'>";
              echo "</form>";
              
              // Cerramos la conexión
              mysqli_close($conexion);
              break;

              case "detalles": 
                $idventa = $_GET['id'];
  
                // Ejecutar la consulta SQL
                $sql = "SELECT * FROM ventas_detalles WHERE idventa = $idventa";
                $resultado = mysqli_query($conexion, $sql);
        
                // Crear la tabla HTML y mostrar los datos
                echo "<h1><center><font size= 6px  color='purple' face='Century Gothic'>Detalles del Pedido</font></center></h1>";
                echo "<table class='tabladis'>";
                echo "<tr>
                    <th>ID Venta</th>
                    <th>ID Producto</th>
                    <th>Nombre del producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>";
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $fila['idventa'] . "</td>";
                    echo "<td>" . $fila['idproducto'] . "</td>";
                    echo "<td>" . $fila['nombre_prod'] . "</td>";
                    echo "<td>" . $fila['cantidad_prod'] . "</td>";
                    echo "<td>" . $fila['total'] . "</td>";
                    ?>
                    <?php
                }
                echo "</table>";
                // Cerrar la conexión a la base de datos
                mysqli_close($conexion);
                break;
  
          }
        ?>
        </div> 
    </body>
    <?php 
      if($t == "ue" || $t=="pe") {
        echo "<script>";
        echo "document.getElementById('cancelar').addEventListener('click', function() {
        window.close();});";
        echo "</script>";
      }
    ?>
</html>