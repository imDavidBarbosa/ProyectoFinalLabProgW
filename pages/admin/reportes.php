<?php include("topmenu.php");?> 
    <section class="secdash">
        <div id= "contenido">
            <form class="vSel reportes" action="" method="get">
                <?php 
                    $view = $_GET['view'];
                    if($view == "rv") {
                        echo '<button class="selector on" type="submit" name="view" value="rv">Reporte de Ventas</button>';
                        echo '<button class= "selector" type="submit" name="view" value="mav">Más Vendidos</button>';
                        echo '<button class= "selector" type="submit" name="view" value="mev">Menos Vendidos</button>';
                    } else if($view == "mav") {
                        echo '<button class="selector" type="submit" name="view" value="rv">Reporte de Ventas</button>';
                        echo '<button class= "selector on" type="submit" name="view" value="mav">Más Vendidos</button>';
                        echo '<button class= "selector" type="submit" name="view" value="mev">Menos Vendidos</button>';
                    } else {
                        echo '<button class="selector" type="submit" name="view" value="rv">Reporte de Ventas</button>';
                        echo '<button class= "selector" type="submit" name="view" value="mav">Más Vendidos</button>';
                        echo '<button class= "selector on" type="submit" name="view" value="mev">Menos Vendidos</button>';
                    }
                    
                    ?>
            </form>
            <?php
                require("../../database/connection.php");
                
                if($view == "rv") {
                    echo "<h1><center><font size= 6px  color='purple' face='Century Gothic'>Reporte de Ventas</font></center></h1>";
                    echo '<div style="text-align: center;">';
		            echo '<form method="POST" action="">';
			        echo '<label.esp for="fecha_inicio">Fecha de inicio:</label>';
			        echo '<input type="date" id="fecha_inicio" name="fecha_inicio">';
			        echo '<label.esp for="fecha_fin">Fecha de fin:</label>';
			        echo '<input type="date" id="fecha_fin" name="fecha_fin">';
                    echo '<br>';
			        echo '<button type="submit">Mostrar</button>';
                    echo '<br><br>';
		            echo '</form>';
                    // Obtener los valores de fecha seleccionados por el usuario
                    if (isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])) {
                        $fecha_inicio = $_POST['fecha_inicio'];
                        $fecha_fin = $_POST['fecha_fin'];
                        // Consulta para seleccionar los datos de la vista con el rango de fechas
                        if($fecha_fin == null && $fecha_inicio == null) {
                            $sql = "SELECT * FROM ReportesVentas";
                            $resultado = mysqli_query($conexion, $sql);
    
                            echo "<table class='tabladis' style='font-family: Century Gothic'>";
                            echo "<tr>
                                <th>ID Venta</th>
                                <th>ID Cliente</th>
                                <th>ID Estatus</th>
                                <th>Total</th>
                                <th>Fecha</th>
                            </tr>";
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                echo "<tr>";
                                echo "<td>" . $fila['idventa'] . "</td>";
                                echo "<td>" . $fila['idcliente'] . "</td>";
                                echo "<td>" . $fila['idestatus'] . "</td>";
                                echo "<td>$" . $fila['Total'] . "</td>";
                                echo "<td>" . $fila['fecha'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>"; 
                        } else {
                            $sql = "SELECT * FROM ReportesVentas WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
                            $resultado = mysqli_query($conexion, $sql);
    
                            echo "<table class='tabladis' style='font-family: Century Gothic'>";
                            echo "<tr>
                                <th>ID Venta</th>
                                <th>ID Cliente</th>
                                <th>ID Estatus</th>
                                <th>Total</th>
                                <th>Fecha</th>
                            </tr>";
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                echo "<tr>";
                                echo "<td>" . $fila['idventa'] . "</td>";
                                echo "<td>" . $fila['idcliente'] . "</td>";
                                echo "<td>" . $fila['idestatus'] . "</td>";
                                echo "<td>$" . $fila['Total'] . "</td>";
                                echo "<td>" . $fila['fecha'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                    } else {
                        // Consulta para seleccionar los datos de la vista sin un rango de fechas
                        $sql = "SELECT * FROM ReportesVentas";
                        $resultado = mysqli_query($conexion, $sql);

                        echo "<table class='tabladis' style='font-family: Century Gothic'>";
                        echo "<tr>
                            <th>ID Venta</th>
                            <th>ID Cliente</th>
                            <th>ID Estatus</th>
                            <th>Total</th>
                            <th>Fecha</th>
                        </tr>";
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<td>" . $fila['idventa'] . "</td>";
                            echo "<td>" . $fila['idcliente'] . "</td>";
                            echo "<td>" . $fila['idestatus'] . "</td>";
                            echo "<td>$" . $fila['Total'] . "</td>";
                            echo "<td>" . $fila['fecha'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    mysqli_close($conexion);
                }
            ?>
        </div>
    </section>
    </body>

<script src="../../script/general.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../../script/jquery.flipster.min.js"></script>