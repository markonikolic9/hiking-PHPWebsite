<?php
    include "../../config/connection.php";

    if(isset($_POST['btnInsertUloga'])){
        
        $nazivUloge = $_POST['uloga']; 

        $upitInsert = "INSERT INTO uloga SET id_u=null, naziv=:naziv";
        $prepare=$conn->prepare($upitInsert);
        $prepare->bindParam(":naziv", $nazivUloge);

        if($prepare->execute()){
            $upit="SELECT * FROM uloga";
            $uloge = $conn->query($upit)->fetchAll();

            $ispis='<thead>
            <tr>
                <th>ID_U</th>
                <th>Uloga</th>
                <th>Kontrole</th>
            </tr>
        </thead>
        <tbody>';
        foreach($uloge as $uloga){
        $ispis .= '<tr class="odd gradeX">
                        <td class="center">'.$uloga->id_u.'</td>
                        <td class="center">'.$uloga->naziv.'</td>
                        <td><input class="btn btn-danger btn-md obrisiUlogu" data-id="'.$uloga->id_u.'" type="button" value="delete"/></td>
                   </tr>';
        }

        $ispis .= '</tbody>';
        echo $ispis;

        } else {
            echo "Baza trenutno nije dostupna";
        }
    }


    if(isset($_POST['btnObrisiUlogu'])){

        $idU = $_POST['idU'];
        $upitObrisi="DELETE FROM uloga WHERE id_u=:idU";
        $prepare=$conn->prepare($upitObrisi);
        $prepare->bindParam("idU", $idU);

        if($prepare->execute()){
            $upit="SELECT * FROM uloga";
            $uloge=$conn->query($upit)->fetchAll();

            $ispis='<thead>
            <tr>
                <th>ID_U</th>
                <th>Uloga</th>
                <th>Kontrole</th>
            </tr>
        </thead>
        <tbody>';
        foreach($uloge as $uloga){
            $ispis .= '<tr class="odd gradeX">
                        <td class="center">'.$uloga->id_u.'</td>
                        <td class="center">'.$uloga->naziv.'</td>
                        <td><input class="btn btn-danger btn-md obrisiUlogu" data-id=".$uloga->id_u." type="button" value="delete"/></td>
                   </tr>';
        }

        $ispis .= '</tbody>';
        echo $ispis;
        } else {
            echo "Baza trenutno nije dostupna";
        }

    }



?>