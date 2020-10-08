<?php

function dohvatiProizvod($id){
    global $conn;
    $upit = "SELECT * FROM proizvodi p INNER JOIN kategorija k ON p.id_ka = k.id_ka INNER JOIN brend b ON p.id_b = b.id_b WHERE id_p = :id";

    $prepare = $conn->prepare($upit);
    $prepare ->bindParam("id", $id);
    try{
        $prepare->execute();
        $proizvod = $prepare->fetch();
        return $proizvod;
    }catch(PDOException $e){
        echo $e->getMessage();
    }

}