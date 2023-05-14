<!-- PIE DE PÁGINA -->
<footer>
    <p>&copy; Copyright Sweet Beauty Shop 2022-<?php echo date("Y");?></p> <!-- Copyright del pie de página -->
</footer>
<!-- Llamdas a los scripts externos .js que serán utilizados -->
<?php 
    if ($ap == "inicio.php") {
        echo '<script src="script/general.js"></script>';
        echo '<script src="script/music.js"></script>';
        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
        echo '<script src="script/jquery.flipster.min.js"></script>';

        echo '<script>';
        echo 'var welcome = new Audio("media/sound/welcome.wav");';
        echo 'welcome.volume = 0.2;';
        echo 'welcome.play();';
        echo '</script>';
    } else {
        echo '<script src="../script/general.js"></script>';
        echo '<script src="../script/music.js"></script>';
        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
        echo '<script src="../script/jquery.flipster.min.js"></script>';
    }
?>

