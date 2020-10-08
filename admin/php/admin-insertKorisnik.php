<?php
    include "../../config/connection.php";

    if(isset($_POST['btnForma'])){

        $idK=$_POST['idK'];
        $upit = "SELECT * FROM korisnik k INNER JOIN uloga u ON k.id_u=u.id_u where k.id_k=$idK";
        $korisnik=$conn->query($upit)->fetch();

        $upitUloga = "SELECT * FROM uloga";
        $uloge=$conn->query($upitUloga)->fetchAll();

        $ispis='<div class="col-lg-12">
        <h1 id="naslovForma">Update User</h1>
        <form id="forma" role="form">
            <div class="form-group">
                <label>Ime</label>
                <input type="text" id="tbIme" class="form-control" value="'.$korisnik->ime.'">
            </div>
            <div class="form-group">
                <label>Prezime</label>
                <input type="text" id="tbPrezime" class="form-control" value="'.$korisnik->prezime.'">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" id="tbEmail" class="form-control" value="'.$korisnik->email.'">
            </div>
            <div class="form-group">
                <label>Uloga </label>
                <select id="uloga" class="form-control">';
                     foreach($uloge as $uloga){
                         if($uloga->id_u==$korisnik->id_u){
                            $ispis.='<option selected value="'.$uloga->id_u.'">'.$uloga->naziv.'</option>';
                         }
                         else{
                            $ispis.='<option value="'.$uloga->id_u.'">'.$uloga->naziv.'</option>';
                         }
                         
                     }
                        
                $ispis.='</select>
                        </div>
                        <div class="form-group">
                            <input type="button" data-id="'.$korisnik->id_k.'" id="updateKorisnik1" class="btn btn-primary btn-md" value="UPDATE">
                        </div>
                        <label id="meni-insert-result"> </label>
                        </form>
                        </div>';

        echo $ispis;
    }




    if(isset($_POST['btnUpdate'])){

        $idK = $_POST['idK'];
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $email = $_POST['email'];
        $uloga = $_POST['uloga'];

        $upitUpdate = "UPDATE korisnik SET ime=:ime, prezime=:prezime, email=:email, id_u=:uloga WHERE id_k=:idK";
        $priprema = $conn->prepare($upitUpdate);
        $priprema->bindParam(":ime", $ime);
        $priprema->bindParam(":prezime", $prezime);
        $priprema->bindParam(":email", $email);
        $priprema->bindParam(":uloga", $uloga);
        $priprema->bindParam(":idK", $idK);



        if($priprema->execute()){
            $upit = "SELECT * FROM korisnik k INNER JOIN uloga u ON k.id_u=u.id_u";
            $korisnici = $conn->query($upit)->fetchAll();

            $ispis='<thead>
            <tr>
                <th>ID_K</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Email</th>
                <th>Uloga</th>
                <th>Kontrole</th>
            </tr>
        </thead>
        <tbody>';
        foreach($korisnici as $korisnik){
            $ispis.=
            '<tr class="odd gradeX">
                <td>'. $korisnik->id_k.'</td>
                <td>'. $korisnik->ime.'</td>
                <td>'. $korisnik->prezime.'</td>
                <td class="center">'. $korisnik->email.'</td>
                <td class="center">'. $korisnik->naziv.'</td>
                <td><input class="btn btn-primary btn-md updateKorisnik" data-id="'. $korisnik->id_k.'" type="button" value="update"/> &nbsp;
                <input class="btn btn-danger btn-md obrisiKorisnik" data-id="'. $korisnik->id_k.'" type="button" value="delete"/></td>
            </tr>';
        }

        $ispis .= '</tbody>';
        echo $ispis;
        } else {
            echo "Baza trenutno nije dostupna";
        }
        

    }


    if(isset($_POST['btnObrisi'])){
        $idK = $_POST['idK'];
        $upitObrisi = "DELETE FROM korisnik WHERE id_k=:idK";
        $priprema = $conn->prepare($upitObrisi);
        $priprema->bindParam(":idK", $idK);

        if($priprema->execute()){
            $upit = "SELECT * FROM korisnik k INNER JOIN uloga u ON k.id_u=u.id_u";
            $korisnici = $conn->query($upit)->fetchAll();

            $ispis='<thead>
            <tr>
            <th>ID_K</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Email</th>
            <th>Uloga</th>
            <th>Kontrole</th>
            </tr>
        </thead>
        <tbody>';
        foreach($korisnici as $korisnik){
            $ispis.=
            '<tr class="odd gradeX">
                <td>'. $korisnik->id_k.'</td>
                <td>'. $korisnik->ime.'</td>
                <td>'. $korisnik->prezime.'</td>
                <td class="center">'. $korisnik->email.'</td>
                <td class="center">'. $korisnik->naziv.'</td>
                <td><input class="btn btn-primary btn-md updateKorisnik" data-id="'. $korisnik->id_k.'" type="button" value="update"/> &nbsp;
                <input class="btn btn-danger btn-md obrisiKorisnik" data-id="'. $korisnik->id_k.'" type="button" value="delete"/></td>
            </tr>';
        }

        $ispis .= '</tbody>';
        echo $ispis;
        } else {
            echo "Baza trenutno nije dostupna";
        }
    }



?>