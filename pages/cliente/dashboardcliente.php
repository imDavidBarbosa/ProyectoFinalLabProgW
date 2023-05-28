<?php 
    include("topmenu.php");
    if(isset($_SESSION['rol'])) {
        include('../modal.php');
    }
    ?>
    <script type="text/javascript" src="../../script/emergentes.js"></script>
    <section class="secdash">
        <div id= "contenido">
            <form class="vSel" action="" method="get">
                <?php 
                    $view = $_GET['view'];
                    if($view == "p") {
                        echo '<button class="selector on" type="submit" name="view" value="p">Pedidos</button>';
                        echo '<button class= "selector" type="submit" name="view" value="a">Dirección</button>';
                    } else {
                        echo '<button class="selector" type="submit" name="view" value="p">Pedidos</button>';
                        echo '<button class= "selector on" type="submit" name="view" value="a">Dirección</button>';
                    }
                    ?>
            </form>
            <?php
                require("../../database/connection.php");
                if($view == "p") {
                    $sql = "SELECT idventa, fecha, idcliente, descestatus FROM ventas INNER JOIN estatus ON ventas.idestatus = estatus.idestatus WHERE idcliente = $_SESSION[userid]";
                    $resultado = mysqli_query($conexion, $sql);
                    
                    echo "<table class='tabladis userdash'>";
                    echo "<tr>
                    <th>Número de Pedido</th>
                    <th>Fecha del Pedido</th>
                    <th>Estatus</th>
                    <th>Ver Productos</th>
                    </tr>";
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $fila['idventa'] . "</td>";
                        echo "<td>" . $fila['fecha'] . "</td>";
                        echo "<td>" . $fila['descestatus'] . "</td>";?>
                        <td class="viewclass">
                            <a onclick="openPopup(); return false;">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                        <?php
                        echo "</tr>";
                    }
                    echo "</table>";    
                }
                mysqli_close($conexion);
                ?>
            </div>
        </section>
    </body>
    <script src="../../script/general.js"></script>
    <script src="../../script/music.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../script/jquery.flipster.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </html>