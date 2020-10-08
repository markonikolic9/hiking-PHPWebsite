<?php

function dohvatiRegistrovanogKorisnika($email){
    global $conn;

    $upit = "SELECT * FROM korisnik WHERE email = :email";
    $prepare=$conn->prepare($upit);
    $prepare->bindParam("email", $email);
    $prepare->execute();
    if($prepare->rowCount() == 0){
        return false;
    } else {
        return $prepare->fetch();
    }
}

function insertNovogKorisnika($ime, $prezime, $email, $sifra){

    global $conn;
    $upit = "INSERT INTO korisnik ('id_k', 'ime', `prezime`, `email`, `sifra`, `id_u`) VALUES ('', :ime, :prezime, :email, :pass, '2')";
    $priprema = $conn->prepare($upit);
    $priprema->bindParam("ime", $ime);
    $priprema->bindParam("prezime", $prezime);
    $priprema->bindParam("email", $email);
    $priprema->bindParam("sifra", $sifra);

    try{
        $priprema->execute();

    }catch (PDOException $ex){
        $ex->getMessage();
    }

}




