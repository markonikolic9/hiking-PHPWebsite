<?php

    include "../config/connection.php";

    if(isset($_POST['btn'])) {

        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $greske = [];

        $regImePrezime = "/^[A-ZČĆŽĐŠ][a-zčćžđš]{2,15}$/";
        if (!preg_match($regImePrezime, $ime)) {
            array_push($greske, "Loš format imena!");
        }

        if (!preg_match($regImePrezime, $prezime)) {
            array_push($greske, "Loš format prezimena!");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($greske, "Loš format email-a!");
        }

        $regPass = "/^(?=.*\d)(?=.*[a-z])[0-9a-zA-Z]{6,}$/";
        if (!preg_match($regPass, $pass)) {
            array_push($greske, "Loš format šifre!");
        }


        if (count($greske) == 0) {

            include "functions/functionKorisnik.php";
            $korisnik = dohvatiRegistrovanogKorisnika($email);

            if (!$korisnik) {

                $sifra = md5($pass);
                try {
                    $noviKorisnikUpit = "INSERT INTO korisnik VALUES ('', ?, ?, ?, ?, '2')";
                    global $conn;
                    $priprema = $conn->prepare($noviKorisnikUpit);
                    $rezultat=$priprema->execute([$ime, $prezime, $email, $sifra]);
                    echo "Uspesno ste se registrovali!";
                    http_response_code(201);

                    }catch (PDOException $e) {
                        echo $e->getMessage();
                    }
        } else {
                http_response_code(400);
            }
        } else {
            http_response_code(422);
        }
    }
?>