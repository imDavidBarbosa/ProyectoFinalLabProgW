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
                            <a href="../popups.php?id=<?php echo $fila['idventa'];?>&type=a" onclick="openPopup(); return false;">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                        <?php
                        echo "</tr>";
                    }
                    echo "</table>";    
                }else {
                    $sql = "SELECT iduser FROM direcciones WHERE iduser = $_SESSION[userid]";
                    $resultado = mysqli_query($conexion, $sql);
                    $userdirec =  mysqli_fetch_row($resultado);
                    if(!($userdirec == "")) {
                        $usertrue = implode("", $userdirec);
                    } else {
                        $usertrue = $userdirec;
                    }
                    if ($usertrue == $_SESSION['userid']) {
                        echo "<table class='tabladis userdash'>";
                        echo "<tr>
                        <th>Calle</th>
                        <th>Número Exterior</th>
                        <th>Número Interior</th>
                        <th>Colonia</th>
                        <th>Municipio</th>
                        <th>Editar</th>
                        </tr>";
                        $sql2 = "SELECT * FROM direcciones WHERE iduser = $_SESSION[userid]";
                        $resultado2 = mysqli_query($conexion, $sql2);
                        while ($fila = mysqli_fetch_assoc($resultado2)) {
                            if($fila['numint'] == "") {
                                $numint = "N/A";
                            } else {
                                $numint = $fila['numint'];
                            }
                            echo "<tr>";
                            echo "<td>" . $fila['calle'] . "</td>";
                            echo "<td>" . $fila['numext'] . "</td>";
                            echo "<td>" . $numint . "</td>";
                            echo "<td>" . $fila['colonia'] . "</td>";
                            echo "<td>" . $fila['municipio'] . "</td>";?>
                            <td class="viewclass">
                                <a href="../popups.php?id=<?php echo $fila['iduser'];?>&type=b" onclick="openPopup(); return false;">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                            <?php
                            echo "</tr>";
                        }
                        echo "</table>"; 
                    }else {
                        echo "<center>";
                        echo "<p class='advAdd'>No tienes una dirección, por favor agrega una</p>";
                        echo '<form class="formAdd" action="saveadd.php" method="post">';
                        echo '<div class="user-details address">';
                        echo '<div class="input-box">';
                        echo '<span class="details">Calle</span>';
                        echo '<input type="text" name="calle" required>';
                        echo '</div>';
                        echo '<div class="input-box">';
                        echo '<span class="details">Número Exterior</span>';
                        echo '<input  type="text" name="numext" required>';
                        echo '</div>';
                        echo '<div class="input-box">';
                        echo '<span class="details">Número Interior</span>';
                        echo '<input class="empty" type="text" name="numint" >';
                        echo '</div>';
                        echo '<div class="input-box">';
                        echo '<label class="details" for="col">Marca:</label>';
                        echo "<select name='col' id='col'>";
                        echo "<option value='Misión de Fundadores'>Misión de Fundadores</option>";
                        echo "<option value='Valle de San Andrés'>Valle de San Andrés</option>";
                        echo "<option value='Real de San Andrés'>Real de San Andrés</option>";
                        echo "<option value='Jardínes de San Andrés'>Jardínes de San Andrés</option>";
                        echo "<option value='Metroplex I'>Metroplex I</option>";
                        echo "<option value='Metroplex II'>Metroplex II</option>";
                        echo "<option value='Ebanos 4to Sector'>Ebanos 4to Sector</option>";
                        echo '</select>';
                        echo '</div>';
                        echo '<div class="input-box">';
                        echo '<span class="details">Municipio</span>';
                        echo '<input type="text" name="mun" value="Apodaca" required readonly="readonly">';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="button">';
                        echo '<input type="submit" value="Guardar">';
                        echo '</div>';
                        echo '</form>';
                        echo "</center>";
                    }
    
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