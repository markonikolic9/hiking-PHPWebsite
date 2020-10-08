<?php
session_start();
include "../config/connection.php";

if(isset($_POST['btn'])){
    $narucena = [];
    $idP = $_POST['idP'];

    if(isset($_SESSION['oprema'])) {
        
        $narucena = $_SESSION['oprema'];
        if(in_array($idP, $narucena)) {
            echo "Ovaj proizvod vec imate u korpi!";
        } else {
            array_push($narucena, $idP);
            $_SESSION['oprema'] = $narucena;
        }
      
    } else {
        $narucena = [];
        array_push($narucena,$idP);
        $_SESSION['oprema'] = $narucena;
    }
    
}

if(isset($_POST['btnIzbaci'])) {
    $id = $_POST['izbaciIzSesijeId'];
    $sesija = $_SESSION['oprema'];

    $pozicija = array_search($id, $sesija);

    unset($_SESSION['oprema'][$pozicija]);

    echo "Uspesno izbacen";

}

?>