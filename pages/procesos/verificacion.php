<?php 
    session_start();

    require("../../database/connection.php");

    if(!isset($_SESSION['userid'])){
        header("Location: ../login.php?success=3");

    } else if(isset($_GET['delete'])){
        $i = $_GET['delete'];
        setcookie($i, "",time()-3600, "/");
        header("Location: ../productos.php");

    }
    
    else {
        if(!isset($_SESSION['carritoprods'])) {
            $_SESSION['carritoprods'] = 0;
        }
        $idp = $_GET['idp'];  
        $qty = $_POST['qty'];
        if($qty == 0) {
            header("Location: ../productos.php");
        } else {
            $data = array($idp, $qty);
            $_SESSION['carritoprods']++;
            $i = $_SESSION['carritoprods'];
            $counter = 1;
            $aux = 0;
            while($counter <= $i) {
                if(isset($_COOKIE["$counter"])) {
                    $prods = unserialize($_COOKIE["$counter"]);
                    if($prods[0] == $data[0]) {
                        $data[1] += $prods[1];
                        setcookie($counter, serialize($data), time()+606024*30, "/");
                    } else {
                        $aux++;
                    }
                } else {
                    $aux++;
                }
                $counter++;
            }

            if($aux == $i) {
                setcookie($i, serialize($data), time()+606024*30, "/");
            }
    
            header("Location: ../productos.php?success=100");
        }

    }
?>