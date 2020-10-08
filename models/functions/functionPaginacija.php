<?php


function brojProizvodaPoKategoriji($kategorija){
    global $conn;
    $upit = "SELECT COUNT(*) as broj FROM proizvodi WHERE id_ka = :kategorija";
    $prepare=$conn->prepare($upit);
    $prepare->bindParam(":kategorija", $kategorija);
    try{
        $prepare->execute();
        $broj=$prepare->fetch();
        return $broj;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}