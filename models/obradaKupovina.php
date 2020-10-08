<?php
    session_start();
    if(isset($_POST['btn'])){
        
        $ime= $_POST['ime'];
        $prezime= $_POST['prezime'];
        $adresa= $_POST['adresa'];
        $brojTelefona= $_POST['brojTelefona'];
        $vreme = time();

        $idK = $_SESSION['korisnik']->id_k;

        $greske = [];

        $regImePrezime = "/^[A-ZČĆŽĐŠ][a-zčćžđš]{2,15}$/";
        if(!preg_match($regImePrezime, $ime)){
            array_push($greske, "Loš format imena!");
        }

        if(!preg_match($regImePrezime, $prezime)){
            array_push($greske, "Loš format prezimena!");
        }

        $regAdresa = "/^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})*\s[0-9]{1,4}(\/[0-9]{1,4})?$/";
        if(!preg_match($regAdresa, $adresa)){
            array_push($greske, "Loš format adrese!");
        }

        $regBrojTelefona="/^06[0-9]{1}[0-9]{6}([0-9]{1})?$/";
        if(!preg_match($regBrojTelefona, $brojTelefona)){
            array_push($greske, "Loš format broja telefona!");
        }

        if(count($greske)==0){
            
            try{
            $idOdNarucenih = $_SESSION['oprema'];
            require_once "../config/connection.php";
            include "functions/functionKupovina.php";
            foreach($idOdNarucenih as $idOdNarucenog){

                $proizvod = dohvatiProizvodPoId($idOdNarucenog);

                $cena = $proizvod->cena;
                $idP = $proizvod->id_p;

                $insertUpit = insertNaruceneOpreme($ime, $prezime, $adresa, $brojTelefona, $vreme, $cena, $idP, $idK);

            }
                echo "Uspesno ste realizovali kupovinu!";
                http_response_code(201);
                }
                catch(PDOException $e){
                    http_response_code(500);
                    echo $e->getMessage();
                }

        } else {
            http_response_code(422);
        }

    } else {
        http_response_code(403);
    }


?>