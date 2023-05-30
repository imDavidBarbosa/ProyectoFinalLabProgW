<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carrito de compra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true-">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
          if($ap == "inicio.php") {
            require("database/connection.php");
          } else if ($ap == "dashboardcliente.php"){
            require("../../database/connection.php");
          } else {
            require("../database/connection.php");
          }
          echo "<table class='carrito'>";
            $counter = 1;
            $aux = 1;
            $total = 0;
            if(isset($_SESSION['carritoprods'])) {
              while ($counter <= $_SESSION['carritoprods']) {
                $habilitarBoton = false;
                if(isset($_COOKIE["$counter"])) {
                  $prods = unserialize($_COOKIE["$counter"]);
                  $sql7 = ("SELECT * FROM productos INNER JOIN marca WHERE id = $prods[0]");
                  $query7 = mysqli_query($conexion, $sql7);
                  $fila = mysqli_fetch_array($query7);
                  echo "<tr>";
                  if($ap == "dashboardcliente.php") {
                    echo "<td><img src='../../media/img/productos/$fila[img]' widht=100px height=100px></td>";
                  } else {
                    echo "<td><img src='../media/img/productos/$fila[img]' widht=100px height=100px></td>";
                  }
                  echo "<td>$fila[nombre]</td>";
                  echo "<td>$fila[nomb_marca]</td>";
                  echo "<td>$prods[1]</td>";
                  $ptot = $prods[1]*$fila['precio'];
                  echo "<td>$$ptot.00</td>";
      
                  echo "<td>";
                  echo "<a href='procesos/verificacion.php?delete=$counter'>";
                  echo "<i class='fa-solid fa-trash' style='color: #000000;'></i>";
                  echo "</td>";
                  $total += $ptot;
                } else {
                  $aux += 1;
                }
                $counter++;
                echo "</tr>";
              }
              if ($aux == $counter) {
                echo "<tr>";
                echo "<td class='total' colspan='6'>No hay productos en su carrito</td>";
                echo "</td>";
                $habilitarBoton = true;
              }
            } else {
              echo "<tr>";
              echo "<td class='total' colspan='6'>No hay productos en su carrito</td>";
              echo "</td>";
              $habilitarBoton = true;
            }
            echo "<tr class='lastrow'>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td class='total'>TOTAL</td>";
            echo "<td class='total'><b>$$total.00</b></td>";
            echo "<td></td>";
            echo "</tr>";
          echo "</table>";
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="pedidoBtn" disabled onclick="buy()">Realizar pedido</button> 
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Obtener referencia al botón
    var pedidoBtn = document.getElementById("pedidoBtn");

    // Verificar si se habilita el botón
    var habilitarBoton = <?php echo $habilitarBoton ? 'false' : 'true'; ?>;
    if (habilitarBoton) {
      pedidoBtn.disabled = false; // Habilitar el botón
    }
  });

</script>