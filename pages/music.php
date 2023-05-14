<!-- Pistas que se utilizan como ambientación de la página web -->
<?php 
    if ($ap == "inicio.php") {
        echo '<audio id="cero" src="media/sound/0.mp3" loop></audio>';
        echo '<audio id="dos" src="media/sound/2.mp3" loop></audio>';
        echo '<audio id="uno" src="media/sound/1.mp3" loop></audio>';
        echo '<audio id="tres" src="media/sound/3.mp3" loop></audio>';
        echo '<audio id="cuatro" src="media/sound/4.mp3" loop></audio>';
        echo '<audio id="cinco" src="media/sound/5.mp3" loop></audio>';
        echo '<audio id="seis" src="media/sound/6.mp3" loop></audio>';
        echo '<audio id="siete" src="media/sound/7.mp3" loop></audio>';
        echo '<audio id="ocho" src="media/sound/8.mp3" loop></audio>';
        echo '<audio id="nueve" src="media/sound/9.mp3" loop></audio>';
    } else {
        echo '<audio id="cero" src="../media/sound/0.mp3" loop></audio>';
        echo '<audio id="dos" src="../media/sound/2.mp3" loop></audio>';
        echo '<audio id="uno" src="../media/sound/1.mp3" loop></audio>';
        echo '<audio id="tres" src="../media/sound/3.mp3" loop></audio>';
        echo '<audio id="cuatro" src="../media/sound/4.mp3" loop></audio>';
        echo '<audio id="cinco" src="../media/sound/5.mp3" loop></audio>';
        echo '<audio id="seis" src="../media/sound/6.mp3" loop></audio>';
        echo '<audio id="siete" src="../media/sound/7.mp3" loop></audio>';
        echo '<audio id="ocho" src="../media/sound/8.mp3" loop></audio>';
        echo '<audio id="nueve" src="../media/sound/9.mp3" loop></audio>';
    }
?>
