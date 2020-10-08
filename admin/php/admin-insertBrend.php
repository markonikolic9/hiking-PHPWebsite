<?php

    include "../../config/connection.php";
    if(isset($_POST['btnInsertBrend'])){
        $naziv = $_POST['naziv'];
        $insertBrend = "INSERT INTO brend SET id_b=null, naziv_brend='$naziv'";

        try{
            $conn->query($insertBrend);
            $upit = "SELECT * FROM brend";
            $brend=$conn->query($upit)->fetchAll();

            $ispis='<thead>
            <tr>
                <th>ID_B</th>
                <th>Naziv</th>
                <th>Kontrole</th>
            </tr>
        </thead>
        <tbody>';
        foreach($brend as $b){
            $ispis.='<tr class="odd gradeX">
            <td class="center">'.$b->id_b.'</td>
            <td class="center">'.$b->naziv_brend.'</td>
            <td><input class="btn btn-danger btn-md obrisiBrend" data-id="'.$b->id_b.'" type="button" value="delete"/></td>
        </tr>';
        }

        $ispis.= '</tbody>';
        echo $ispis;
        } catch(PDOException $e){
            echo $e->getMesagge();
        }
    }
    

    if(isset($_POST['btnObrisiBrend'])){
        $idB=$_POST['idB'];
        $obrisiBrend = "DELETE FROM brend WHERE id_b='$idB'";

        try{
            $conn->query($obrisiBrend);
            $upit = "SELECT * FROM brend";
            $brend=$conn->query($upit)->fetchAll();
            $ispis='<thead>
            <tr>
                <th>ID_B</th>
                <th>Naziv</th>
                <th>Kontrole</th>
            </tr>
        </thead>
        <tbody>';
        foreach($brend as $b){
            $ispis.='<tr class="odd gradeX">
            <td class="center">'.$b->id_b.'</td>
            <td class="center">'.$b->naziv_brend.'</td>
            <td><input class="btn btn-danger btn-md obrisiBrend" data-id="'.$b->id_b.'" type="button" value="delete"/></td>
        </tr>';
        }
        $ispis.= '</tbody>';
        echo $ispis;
        } catch(PDOException $e){
            echo $e->getMesagge();
        }
    }
?>