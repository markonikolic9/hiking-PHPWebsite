<?php

function dohvatiProizvodPoId($id){
    global $conn;
    $upit = "SELECT * FROM proizvodi WHERE id_p= :id";

    $prepare = $conn->prepare($upit);
    $prepare->bindParam(":id", $id);
    try{
        $prepare->execute();
        $proizvod = $prepare->fetch();
        return $proizvod;
    }catch(PDOException $e){
        return $e->getMessage();
    }
}

function insertNaruceneOpreme($ime, $prezime, $adresa, $telefon, $vreme, $cena, $idP, $idK){
    global $conn;
    $insertUpit = "INSERT INTO korpa VALUES ('',?, ?, ?, ?, ?,?, ?,?)";

    $prepare = $conn->prepare($insertUpit);
    try{
        $prepare->execute([$ime,$prezime,$adresa,$telefon,$vreme,$cena,$idK,$idP]);
        return true;
    } catch(PDOException $e){
        return $e->getMessage();
    }
}