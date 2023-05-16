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
        if (isset($_SESSION['rol'])){  
            echo '<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>';
            echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>';
        }
    } else if (isset($_SESSION['rol']) && $ap != "dashboardcliente.php") {
        echo '<script src="../script/general.js"></script>';
        echo '<script src="../script/music.js"></script>';
        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
        echo '<script src="../script/jquery.flipster.min.js"></script>';     
        echo '<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>';
        echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>';
    } else if ($ap == "dashboardcliente.php") {
        echo '<script src="../../script/general.js"></script>';
        echo '<script src="../../script/music.js"></script>';
        echo '<script src="script/jquery.flipster.min.js"></script>';
        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
        echo '<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>';
        echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>';
    } else {
        echo '<script src="../script/general.js"></script>';
        echo '<script src="../script/music.js"></script>';
        echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
        echo '<script src="../script/jquery.flipster.min.js"></script>';
    }
?>

