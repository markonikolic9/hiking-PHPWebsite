<?php

require_once "config.php";


try{
    $conn = new PDO("mysql:host=".SERVER.";dbname=".BAZA.";charset=utf8",USER,PASS);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(PDOException $e){
    echo $e -> getMessage();
}

//function zabeleziPristupStranici() {
//    $stranica = basename($_SERVER['REQUEST_URI']);
//    if ($stranica == "index.php?page=oprema&kategorija=2") {
//        $file = fopen(LOG_FAJL, "a");
//        $date = date("d.m.Y H:i:s");
//        $string = $_SERVER['REMOTE_ADDR'] . "\t" . $date . "\t" . $_SESSION['korisnik']->email . "\n";
//        fwrite($file, $string);
//        fclose($file);
//    }
//}
//
//zabeleziPristupStranici();

?>