<?php

include "../config/connection.php";

if(isset($_POST['btn'])){

    $kategorija = $_POST['kategorija'];
    $broj = $_POST['broj'];
    $broj1 = $broj*4;

    $upit = "SELECT * FROM proizvodi p INNER JOIN kategorija k ON p.id_ka = k.id_ka WHERE p.id_ka = $kategorija LIMIT 4 OFFSET $broj1;";
    $data = $conn->query($upit)->fetchAll();

    echo json_encode($data);
}

?>