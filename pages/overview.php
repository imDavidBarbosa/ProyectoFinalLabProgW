<?php 
    session_start();
    include("../topmenu.php");
    if(isset($_SESSION['rol'])) {
      include('modal.php');
    }
    ?>
    <section class="sec3">
        <?php
            $idprod = $_GET['idprod'];
            require("../database/connection.php");
            $sql2 = ("SELECT nombre,descripcion,nomb_marca,precio,cantidad,img FROM productos INNER JOIN marca ON productos.idmarca = marca.idmarca WHERE id = $idprod");
            $query2 = mysqli_query($conexion, $sql2);
            $data = mysqli_fetch_array($query2);
        ?>
        <div class="productos overview">
            <div class="overcontainer">
                <div class="imgcontainer">
                    <img src="../media/img/productos/<?php echo $data['img']?>">
                </div>
                <div class="textcontainerp">
                    <h1><?php echo $data['nombre']?></h1>
                    <h3><?php echo $data['nomb_marca']?></h3>
                    <h2 class="preciop">$<?php echo $data['precio']?>.00</h2>
                    <p><?php echo $data['descripcion']?></p>
                    <div class="comprar">
                        <form action='procesos/verificacion.php?idp=<?php echo $idprod ?> ' method='post'>
                            <input type="number" name="qty" min="0" max=<?php echo $data['cantidad'] ?> step="1" value="0">
                            <button class="compra" type='submit'><i class='fa-solid fa-cart-shopping'></i> Añadir al carrito</button>
                        </form>
                    </div>
                    <p class="cantidad">Cantidad: <?php echo $data['cantidad']?></p>
                </div>
            </div>
        </div>
        <div class="productossimilares">
            <h2>Productos similares</h2>
            <div class="hero">
            <div class="carousel">
                <ul>
                    <?php 

                    $sql3 = ("SELECT nombre_tag FROM (productos INNER JOIN productos_tags ON productos.id = productos_tags.idProductos) INNER JOIN tags ON tags.idtags = productos_tags.idtags WHERE id = $idprod");
                    $query3 = mysqli_query($conexion, $sql3);
                    $st = array();
                    while($data2 = mysqli_fetch_array($query3, MYSQLI_NUM)) {
                      $stim = implode("", $data2);
                      $st[] = $stim;
                    }
                    $tags = implode(",", $st);

                    $sqlid = mysqli_query($conexion, "SELECT id FROM productos WHERE id!=$idprod ORDER BY id");
                    $stprod = array();
                    while($data2 = mysqli_fetch_array($sqlid, MYSQLI_NUM)) {
                      $stim = implode("", $data2);
                      $idprods[] = $stim;
                    }
                    
                    $sql4 = ("SELECT idProductos, nombre_tag FROM (productos INNER JOIN productos_tags ON productos.id = productos_tags.idProductos) INNER JOIN tags ON tags.idtags = productos_tags.idtags WHERE id != $idprod ORDER BY idProductos");
                    $query4 = mysqli_query($conexion, $sql4);
                    $stags = array();
                    $stags2 = array();
                    $i=0;
                    $j= 0;
                    while($data4 = mysqli_fetch_array($query4, MYSQLI_NUM)) {
                        if($idprods[$i] == $data4[0]){
                          $implodetag = $data4[1];
                          $stags[$j] = $implodetag;
                          $j++;
                        } else {
                          unset($stags[$j]);
                          $i++;
                          $stags2[] = implode(",", $stags);
                          $implodetag = $data4[1];
                          $stags[0] = $implodetag;
                          $j = 1;
                        }
                    }

                    for($i = 0; $i < count($stags2); $i++) {
                      $sim = similar_text($tags, $stags2[$i], $perc);
                      if($perc >= 45) {
                        $sqlimg = mysqli_query($conexion, "SELECT id,img FROM productos WHERE id=$idprods[$i] ORDER BY id");
                        $sqlimga = mysqli_fetch_array($sqlimg);
                        echo "<li><a href='overview.php?idprod=$sqlimga[0]'><img src='../media/img/productos/$sqlimga[1]'></a></li>";
                      }
                    }
                    ?>
                </ul>
            </div>
        </div>
        </div>


    </section>




<?php include("music.php") ?>
<?php include("../footer.php") ?>
<!--Script para la galería de productos más vendidos -->
<script> 
    $('.carousel').flipster({
        style:'carousel',
        spacing: 0.1,
        
    }); 
</script>
<script>
    jQuery('<div class="comprar-nav"><div class="comprar-button comprar-up">+</div><div class="comprar-button comprar-down">-</div></div>').insertAfter('.comprar input');
    jQuery('.comprar').each(function() {
      var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.comprar-up'),
        btnDown = spinner.find('.comprar-down'),
        min = input.attr('min'),
        max = input.attr('max');

      btnUp.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

      btnDown.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

    });
</script>