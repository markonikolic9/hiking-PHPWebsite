<?php

    include "../../config/connection.php";
    if(isset($_POST['btnInsertKategorija'])){
        $naziv = $_POST['naziv'];
        $insertKategoriju = "INSERT INTO kategorija SET id_ka=null, naziv_kategorija='$naziv'";

        try{
            $conn->query($insertKategoriju);
            $upit = "SELECT * FROM kategorija";
            $kategorije=$conn->query($upit)->fetchAll();

            $ispis='<thead>
            <tr>
                <th>ID_KA</th>
                <th>Naziv</th>
                <th>Kontrole</th>
            </tr>
        </thead>
        <tbody>';
        foreach($kategorije as $kategorija){
            $ispis.='<tr class="odd gradeX">
            <td class="center">'.$kategorija->id_ka.'</td>
            <td class="center">'.$kategorija->naziv_kategorija.'</td>
            <td><input class="btn btn-danger btn-md obrisiKategorija" data-id="'.$kategorija->id_ka.'" type="button" value="delete"/></td>
        </tr>';
        }

        $ispis .= '</tbody>';
        echo $ispis;
        } catch(PDOException $e){
            echo $e->getMesagge();
        }
    }

    if(isset($_POST['btnObrisiKategoriju'])){
        $idKa = $_POST['idKa'];
        $obrisiKategoriju = "DELETE FROM kategorija WHERE id_ka='$idKa'";

        try{
            $conn->query($obrisiKategoriju);
            $upit = "SELECT * FROM kategorija";
            $kategorije = $conn->query($upit)->fetchAll();
            
            $ispis='<thead>
            <tr>
                <th>ID_KA</th>
                <th>Naziv</th>
                <th>Kontrole</th>
            </tr>
        </thead>
        <tbody>';
        foreach($kategorije as $kategorija){
            $ispis.='<tr class="odd gradeX">
            <td class="center">'.$kategorija->id_ka.'</td>
            <td class="center">'.$kategorija->naziv_kategorija.'</td>
            <td><input class="btn btn-danger btn-md obrisiKategorija" data-id="'.$kategorija->id_ka.'" type="button" value="delete"/></td>
        </tr>';
        }

        $ispis .= '</tbody>';
        echo $ispis;
        } catch(PDOException $e){
            echo $e->getMesagge();
        }

    }
    

?>