<?php
    session_start();
    include "../config/connection.php";

    if(isset($_POST['btn'])){
        
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $greske = [];

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($greske, "Loš format email-a!");
        }

        $regPass = "/^(?=.*\d)(?=.*[a-z])[0-9a-zA-Z]{6,}$/";
        if(!preg_match($regPass, $pass)){
            array_push($greske, "Loš format šifre!");
        }

        if(count($greske)==0){

            $sifra=md5($pass);

            try{
                include "functions/functionKorisnik.php";
                $korisnik = dohvatiRegistrovanogKorisnika($email);
                if(!$korisnik){
                    http_response_code(404);
                }
                if($korisnik->sifra == $sifra){
                    $_SESSION['korisnik'] = $korisnik;
                    http_response_code(200);
                } else{
                    http_response_code(409);
                }
            }catch (PDOException $ex){
                $ex->getMessage();
                http_response_code(500);
            }

        } else {
            http_response_code(422);
        }

    } else {
        http_response_code(403);
    }


?>