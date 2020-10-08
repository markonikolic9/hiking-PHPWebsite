<?php

function dohvatiProizvodePoKategoriji($kategorija){
    global $conn;
    $upit = "SELECT * FROM proizvodi WHERE id_ka = :kategorija LIMIT 0, 4";

    $prepare=$conn->prepare($upit);
    $prepare -> bindParam(":kategorija", $kategorija);
    try{
        $prepare->execute();
        $proizvodi = $prepare->fetchAll();
        return $proizvodi;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function dohvatiKategoriju($kategorija){
    global $conn;
    $upit = "SELECT * FROM kategorija WHERE id_ka = :kategorija";
    $prepare = $conn->prepare($upit);
    $prepare->bindParam(":kategorija", $kategorija);
    try{
        $prepare->execute();
        $kategorija = $prepare->fetch();
        return $kategorija;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}