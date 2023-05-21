<?php 
    session_start();
    include("../topmenu.php");

    if(isset($_SESSION['rol'])) {
        include('modal.php');
    }
?>
    <style> /*Estilo para ocultar el toast que aparece al redireccionar
            desde register.php hasta login.php*/
        body {
            overflow-x: hidden;
        }
    </style>
    <script>
        function overview(id) {
            window.location.href = "overview.php?idprod=" + id;
        }
    </script>

    <section class="sec3">
        <div class="backtopm"></div>
        <?php require("../database/connection.php");?>
        
        <div class="searchbox">
            <div class="busqueda">
                <form action="productos.php" method="post">
                    <input type="text" placeholder="Buscar..." name="bus">
                    <button class="lupa" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <?php 
            if(!empty($_POST["bus"])) {
                $bus = $_POST["bus"];
                if(str_word_count($bus) <= 1) {
                    $sql1 = ("SELECT DISTINCT id,nombre,idmarca,precio,img FROM (productos INNER JOIN productos_tags ON productos.id = productos_tags.idProductos) INNER JOIN tags ON tags.idtags = productos_tags.idtags WHERE (nombre LIKE '%$bus%') OR (descripcion LIKE '%$bus%') OR (nombre_tag LIKE '%$bus%')");
                } else {
                    $clave = array();
                    $palabras = explode(" ", $bus);
                    for ($i = 0; $i<count($palabras); $i++){
                        if(($palabras[$i] != "para") && ($palabras[$i] != "con") && ($palabras[$i] != "la") && ($palabras[$i] != "las") && ($palabras[$i] != "el") && ($palabras[$i] != "los")&& ($palabras[$i] != "de")) {
                            $clave[] = $palabras[$i];
                        }
                    }
                    var_dump($clave);

                    $busquedaConsulta = count($clave);
                    
                    switch($busquedaConsulta) {
                        case 1:
                            $sql1 = ("SELECT DISTINCT id,nombre,idmarca,precio,img FROM (productos INNER JOIN productos_tags ON productos.id = productos_tags.idProductos) INNER JOIN tags ON tags.idtags = productos_tags.idtags WHERE (nombre LIKE '%$clave[0]%' OR descripcion LIKE '%$clave[0]%' OR nombre_tag LIKE '%$clave[0]%')");
                            break;
                        case 2: 
                            $sql1 = ("SELECT DISTINCT id,nombre,idmarca,precio,img FROM (productos INNER JOIN productos_tags ON productos.id = productos_tags.idProductos) INNER JOIN tags ON tags.idtags = productos_tags.idtags WHERE (nombre LIKE '%$clave[0]%' OR descripcion LIKE '%$clave[0]%' OR nombre_tag LIKE '%$clave[0]%') AND (nombre LIKE '%$clave[1]%' OR descripcion LIKE '%$clave[1]%' OR nombre_tag LIKE '%$clave[1]%')");
                            break;
                        case 3: 
                            $sql1 = ("SELECT DISTINCT id,nombre,idmarca,precio,img FROM (productos INNER JOIN productos_tags ON productos.id = productos_tags.idProductos) INNER JOIN tags ON tags.idtags = productos_tags.idtags WHERE (nombre LIKE '%$clave[0]%' OR descripcion LIKE '%$clave[0]%' OR nombre_tag LIKE '%$clave[0]%') AND (nombre LIKE '%$clave[1]%' OR descripcion LIKE '%$clave[1]%' OR nombre_tag LIKE '%$clave[1]%') AND (nombre LIKE '%$clave[2]%' OR descripcion LIKE '%$clave[2]%' OR nombre_tag LIKE '%$clave[2]%')");
                            break;
                        case 4:
                            $sql1 = ("SELECT DISTINCT id,nombre,idmarca,precio,img FROM (productos INNER JOIN productos_tags ON productos.id = productos_tags.idProductos) INNER JOIN tags ON tags.idtags = productos_tags.idtags WHERE (nombre LIKE '%$clave[0]%' OR descripcion LIKE '%$clave[0]%' OR nombre_tag LIKE '%$clave[0]%') AND (nombre LIKE '%$clave[1]%' OR descripcion LIKE '%$clave[1]%' OR nombre_tag LIKE '%$clave[1]%') AND (nombre LIKE '%$clave[2]%' OR descripcion LIKE '%$clave[2]%' OR nombre_tag LIKE '%$clave[2]%') AND (nombre LIKE '%$clave[3]%' OR descripcion LIKE '%$clave[3]%' OR nombre_tag LIKE '%$clave[3]%')");
                            break;
                    }
                }
                $query1 = mysqli_query($conexion, $sql1);
                if(mysqli_num_rows($query1) <= 0) {
                    echo "<div class='sorry'> ";
                    echo "<img class='turn' src='../media/img/sorry.png'>";
                    echo "<h1>¡Lo sentimos!</h1>";
                    echo "<h1>El producto \"$bus\" no se encuentra</h1>";
                    echo '</div>';
                } else {
        ?>
        <div class="productos"> 
            <?php
                echo '<div class="pcontainer">';
                while ($arreglo2 = mysqli_fetch_array($query1)) {
                    $id=$arreglo2[0];
                    $img = $arreglo2[4];
                    $nombre = $arreglo2[1];
                    $marca = $arreglo2[2];
                    $precio = $arreglo2[3];

                    $marca = mysqli_query($conexion, "SELECT nomb_marca FROM marca WHERE idmarca = $marca");
                    $brand = mysqli_fetch_array($marca);

                    echo "<div class='card'>";
                    echo "<form action='procesos/verificacion.php?idp=$id' method='post'>";
                    echo "<div class='imgBx'>";
                    echo "<img src='../media/img/productos/$img'>";
                    echo "<ul class='action'>";
                    echo "<li><button type='submit'><i class='fa-solid fa-cart-shopping'></i></button><span>Añadir al carrito</span></li>";
                    echo "<li onclick='overview($id)'><i class='fa-solid fa-eye'></i><span>Ver producto</span></li>";
                    echo "</ul>";
                    echo "</div>";
                    echo "<div class='pcontent'>";
                    echo "<div class='productName'>";
                    echo "<h3>$nombre</h3>";
                    echo "</div>";
                    echo "<div class='price_rating'>";
                    echo "<div class='rating'>";
                    echo "<p>$brand[0]</p>";
                    echo "</div>";
                    

                    echo "<div class='button-container'>
                        <button class='plus' type='button' value='+'>+</button>
                        <input type='text' name='qty' min'0' class='form-control' value='0'>
                        <button class='minus' type='button' value='-'>-</button>
                        </div>";

                    echo "<h2>$$precio.00</h2>";
                    
                    echo "</div>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                }
                echo '</div>';
            ?>
        </div>
        <?php
        }
            } else {
        ?>
        <div class="productos"> 
            <?php
                $sql2 = ("SELECT id,nombre,nomb_marca,precio,img,cantidad FROM productos INNER JOIN marca ON productos.idmarca = marca.idmarca ORDER BY id");
                $query2 = mysqli_query($conexion, $sql2);
                echo '<div class="pcontainer">';
                while ($arreglo2 = mysqli_fetch_array($query2)) {
                    $id=$arreglo2[0];
                    $img = $arreglo2[4];
                    $nombre = $arreglo2[1];
                    $marca = $arreglo2[2];
                    $precio = $arreglo2[3];
                    
                    echo "<div class='card'>";
                    echo "<form action='procesos/verificacion.php?idp=$id' method='post'>";
                    echo "<div class='imgBx'>";
                    echo "<img src='../media/img/productos/$img'>";
                    echo "<ul class='action'>";
                    echo "<li onclick='overview($id)'><i class='fa-solid fa-eye'></i><span>Ver producto</span></li>";
                    echo "<li><button type='submit'><i class='fa-solid fa-cart-shopping'></i></button><span>Añadir al carrito</span></li>";
                    echo "</ul>";
                    echo "</div>";
                    echo "<div class='pcontent'>";
                    echo "<div class='productName'>";
                    echo "<h3>$nombre</h3>";
                    echo "</div>";
                    echo "<div class='price_rating'>";
                    echo "<div class='rating'>";
                    echo "<p>$marca</p>";
                    echo "</div>";

                    echo "<div class='button-container'>
                        <button class='minus' type='button' value='-'>-</button>
                        <input type='text' name='qty' min='0' max = '$arreglo2[5]' class='form-control' value='0' readonly>
                        <button class='plus' type='button' value='+'>+</button>
                        </div>";
                    
                    echo "<h2>$$precio.00</h2>";
                    
                    echo "</div>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                }
                echo '</div>';
            ?>
        </div>
        <?php }
            mysqli_close($conexion);
        ?>
        <div class="toastnb"> 
            <div class="toastnb-content">
                <i class="fas fa-solid fa-check check"></i>
                <div class="message">
                    <span class="text text-1" id="text1">¡Producto agregado!</span>
                    <span class="text text-2" id="text2">Su producto ha sido agregado al carrito</span>
                </div>   
            </div>
            <i class="fa-solid fa-xmark closenb"></i>
            <div class="progress"></div>
        </div>
    </section>
<?php include("music.php") ?>
<?php include("../footer.php") ?>
<script src="../script/toast.js"></script>
<?php 
    if(isset($_GET['success'])){
        $success = $_GET['success'];
        if($success == 100) {
            echo '<script> showToastNb(); </script>';
        } 
    } 
?>
<script>
    const btnCont = document.querySelectorAll(".button-container");
    console.log(btnCont);
    btnCont.forEach(container => {
        var btnPlus = container.querySelector(".plus");
        var btnMinus = container.querySelector(".minus");
        var inputCont = container.querySelector(".form-control");

        btnPlus.addEventListener('click', function(){
            var actValue = parseInt(inputCont.value);
            var maxValue = inputCont.max;
            if(actValue < maxValue) {
                plusV = actValue + 1;
                inputCont.value = plusV;
            }
        });
        btnMinus.addEventListener('click', function(){
            var actValue = parseInt(inputCont.value);
            if(actValue > 0) {
                minusV = actValue - 1;
                inputCont.value = minusV;
            } 
        });
    });
    
</script>
