<?php 
    session_start();
    include("topmenu.php");

    if(isset($_SESSION['rol'])) {
        include('pages/modal.php');
    }
?>
    <section class="portada"> <!-- Sección de la imagen de portada -->
        <h1>Lighting Up Your Life</h1> <!-- Título -->
        <div class="scrolldown"> <!-- Sección de el indicador de deslizarse hacia abajo -->
            <span></span>
            <span></span>
            <span></span>
        </div>
    </section>
    <section class="sec1">
        <?php //Conexión a Base de Datos para mostrar los productos
            require("database/connection.php");
            $sql2 = ("SELECT * FROM productos");
            $query2 = mysqli_query($conexion, $sql2);
        ?>
        <div class="contenedor">
            <h2><span>TODO LO QUE NECESITAS</span></h2> <!-- Subtítulo 1 -->
        </div>
        <div class="hero">
            <div class="carousel">
                <ul>
                    <!--Fotos de carrusel/galería -->
                    <!--Se busca mostrar los productos más vendidos
                    de forma automática a través de una vista creada en la
                    base de datos -->
                    <?php 
                    $sqltop = ("SELECT topsellers.ID, img, topsellers.nombre FROM topsellers INNER JOIN productos ON topsellers.ID = productos.id;");
                    $querytop = mysqli_query($conexion, $sqltop);
                    while($topventas = mysqli_fetch_assoc($querytop)) {
                        echo "<li><a class='topventas' href='pages/overview.php?idprod=$topventas[ID]'><img src='media/img/productos/$topventas[img]'><p>$topventas[nombre]</p></a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="contNeonTxt"> <!-- Contenedor de subtítulo -->
            <h2 class="neonTube">TUS MARCAS FAVORITAS AQUÍ</h2> <!-- Subtítulo -->
        </div>
        <div class="info">
            <div class="marca">
                <img id="jafra" src="media/img/jafralogo.png" alt="jafralogo">
                <p>"Nosotros celebramos el espíritu individual que existe dentro de cada mujer. Y todas esas pequeñas y adorables cosas que te hacen tan imperfectamente perfecta y singularmente hermosa. Celebramos todo lo que eres, todo lo que haces y todo lo que eres capaz de hacer. </p>
                <p>Por eso creamos productos de belleza y oportunidades de negocio para todas tus necesidades. Oportunidades que te permiten explorar, descubrir, reinventar y revelar tu verdadero potencial, y para que todo lo hagas siempre radiando hermosura. </p>
                <p>En JAFRA Creemos en hacer que la confianza en uno mismo sea contagiosa, en difundir el éxito y en inspirar la individualidad." </p>
                <p><i>- JAFRA</i></p>
            </div>
        </div>
        <div id="parallax1" class="imgwide"></div>
        <div class="info">
            <div class="marca" >
                <img id="yvesrocher" src="media/img/yvesrocherlogo.png" alt="yveslogo">
                <p>"Nacimos de una historia de amor entre el Sr. Yves Rocher y la naturaleza de Bretaña, sus costas, sus páramos, sus bosques y sus campos. Pioneros de la Cosmética Botánica, revelamos el poder de las plantas, para el bienestar de todos, en un enfoque respetuoso con la naturaleza y su biodiversidad.</p> 
                <p>Las soluciones más efectivas a menudo se encuentran frente a nosotros en la naturaleza. Revelamos el potencial de las plantas para una belleza más natural y sostenible.</p>  
                <p>Conseguir que nuestra cosmética sea siempre más respetuosa con tu piel y ofrecer productos de gran eficacia. En Yves Rocher apostamos por una belleza viva, por amor a la naturaleza."</p>
                <p><i>-Yves Rocher</i></p>  
            </div>
        </div>
</section>
<?php include("pages/music.php") ?>      
<?php include("footer.php") ?>
        <!--Script para la galería de productos más vendidos -->
        <script> 
            $('.carousel').flipster({
                style:'carousel',
                spacing: 0.1,
                
            }); 
        </script>
</body>
</html>