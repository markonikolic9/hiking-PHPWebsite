<?php
    include "../../config/connection.php";

    if(isset($_POST['insertProizvod'])){
        $naziv = $_POST['tbNaziv'];
        $cena = $_POST['tbCena'];
        $slika = $_FILES['fajlSlika'];
        $slikaAlt = $_POST['slikaAlt'];
        $brend = $_POST['ddlBrend'];
        $kategorija = $_POST['ddlKategorija'];
        $opis = $_POST['txtOpis'];

        $imeSlike = $slika['name'];
        $tmpImeSlike = $slika['tmp_name'];

        $postojanoImeSlike=time().$imeSlike;
        if(move_uploaded_file($tmpImeSlike,"../../vendor/images/$postojanoImeSlike")){

            $upitInsert = "INSERT INTO proizvodi SET id_p=null, naziv=:naziv, putanja=:slikaPutanja, alt=:slikaAlt, cena=:cena, opis=:opis, id_ka=:kategorija, id_b=:brend";
            $prepare=$conn->prepare($upitInsert);
            $prepare->bindParam(":naziv", $naziv);
            $prepare->bindParam(":slikaPutanja", $postojanoImeSlike);
            $prepare->bindParam(":slikaAlt", $slikaAlt);
            $prepare->bindParam(":cena", $cena);
            $prepare->bindParam(":opis", $opis);
            $prepare->bindParam(":kategorija", $kategorija);
            $prepare->bindParam(":brend", $brend);

            if($prepare->execute()){
                header("Location:../pages/index.php?page=insertProizvod");
            } else {
                echo "Baza trenutno nije dostupna";
            }
        } else {
            http_response_code(422);
        }
    }


    function UpdateProizvod($x){
        global $conn;
        $upit="SELECT * FROM proizvodi WHERE id_p=$x";
        $proizvod=$conn->query($upit)->fetch();

        $ispis = '<div class="form-group">
        <label>Naziv</label>
        <input type="text" name="tbNaziv" id="tbNaziv" class="form-control" value="'.$proizvod->naziv.'" required>
        </div>
        <div class="form-group">
        <label>Cena</label>
        <input type="text" name="tbCena"  id="tbCena" class="form-control" value="'.$proizvod->cena.'" required>
        </div>
        <input type="hidden" name="idProizvod" value="'.$proizvod->id_p.'"/>
        <div class="form-group">
        <label>Slika</label>
        <input type="file" name="fajlSlika"  id="fajlSlika" class="form-control" placeholder="Unesite naziv slike">
        </div>
        <div class="form-group">
        <label>Alt slike</label>
        <input type="text" name="slikaAlt" id="slikaAlt" class="form-control" value="'.$proizvod->alt.'" required>
        </div>
        <div class="form-group">
        <label>Opis proizvoda</label>
        <textarea placeholder="" name="txtOpis" id="txtOpis" class="form-control" required>"'.$proizvod->opis.'"
        </textarea>
        </div>
        <div class="form-group">
        <label>Brend </label>
        <select name="ddlBrend" id="ddlBrend" class="form-control">
        <option value="0">Izaberite</option>';
        $upitBrend = "SELECT * FROM brend";
        $brend=$conn->query($upitBrend)->fetchAll();
        foreach($brend as $b){
            if($b->id_b==$proizvod->id_b){
                $ispis .= '<option value="'.$b->id_b.'" selected>'.$b->naziv_brend.'</option>';
            } else {
                $ispis .= '<option value="'.$b->id_b.'">'.$b->naziv_brend.'</option>';
            }
        }
        $ispis .= '</select>
        </div>
        <div class="form-group">
        <label>Kategorija </label>
        <select name="ddlKategorija" id="ddlKategorija" class="form-control">
        <option value="0">Izaberite</option>';
        $upitKategorija = "SELECT * FROM kategorija";
        $kategorije=$conn->query($upitKategorija)->fetchAll();
        foreach($kategorije as $kategorija){
            if($kategorija->id_ka==$proizvod->id_ka){
                $ispis.='<option value="'.$kategorija->id_ka.'" selected>'.$kategorija->naziv_kategorija.'</option>';
            } else {
                $ispis.='<option value="'.$kategorija->id_ka.'">'.$kategorija->naziv_kategorija.'</option>';
            }
        }
        $ispis .= '</select>
        </div><div class="form-group">
        <input type="submit" name="updateProizvod" id="updateProizvod" class="btn btn-primary btn-md" value="UPDATE">
        </div>
        <label id="ispisProizvoda"> </label>'; 
        return $ispis;

    }

    if(isset($_POST['btnUpdateProizvod'])){
        $idP=$_POST['idP'];
        echo UpdateProizvod($idP);
    }


    if(isset($_POST['updateProizvod'])){
        $idP = $_POST['idProizvod'];
        $naziv = $_POST['tbNaziv'];
        $cena = $_POST['tbCena'];
        $slikaAlt = $_POST['slikaAlt'];
        $opis = $_POST['txtOpis'];
        $brend = $_POST['ddlBrend'];
        $kategorija = $_POST['ddlKategorija'];
        
        $slika = $_FILES['fajlSlika'];
        if(empty($slika['ime'])){
            header("Location:../pages/index.php?page=insertProizvod");
            $upitUpdate = "UPDATE proizvodi SET naziv='$naziv', alt='$slikaAlt', cena='$cena', opis='$opis', id_ka='$kategorija', id_b='$brend' WHERE id_p=$idP";
            try{
                $conn->query($upitUpdate);
            } catch(PDOException $e){
                echo $e->getMesagge();
            }
        }
        else {
            
            $imeSlike = $slika['name'];
            $tmpImeSlike = $slika['tmp_name'];
            $postojanoImeSlike=time().$imeSlike;
            if(move_uploaded_file($tmpImeSlike,"../../images/$postojanoImeSlike")){
                $upitUpdate = "UPDATE proizvodi SET naziv='$naziv', putanja='$postojanoImeSlike', alt='$slikaAlt', cena='$cena', opis='$opis', id_ka='$kategorija', id_b='$brend' WHERE id_p=$idP";
                try{
                    $conn->query($upitUpdate);
                    header("Location:../pages/index.php?page=insertProizvod");
                } catch(PDOException $e){
                    echo $e->getMesagge();
                }
            }
        }

    }


    if(isset($_POST['btnObrisiProizvod'])){

        $idP=$_POST['idP'];
        $upitObrisi="DELETE FROM proizvodi WHERE id_p=:idP";
        $prepare=$conn->prepare($upitObrisi);
        $prepare->bindParam(":idP", $idP);

        if($prepare->execute()){
            
            $upit = "SELECT * FROM proizvodi p INNER JOIN brend b ON p.id_b=b.id_b";
            $proizvodi = $conn->query($upit)->fetchAll();
                $ispis = '<thead><tr>
                            <th>ID_P</th>
                            <th>Naziv</th>
                            <th>Slika</th>
                            <th>ID_B</th>
                            <th>Brend</th>
                            <th>Opis</th>
                            <th>ID_K</th>
                            <th>Kategorija</th>
                            <th>Kontrole</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach($proizvodi as $proizvod){
                    $ispis .= '<tr class="odd gradeX">
                    <td>'.$proizvod->id_p.'</td>
                    <td>'.$proizvod->naziv.'</td>
                    <td class="center"><img  width="50px" src="../../'.$proizvod->putanja.'" alt="'.$proizvod->alt.'"/></td>
                    <td class="center">'.$proizvod->id_b.'</td>
                    <td class="center">'.$proizvod->naziv_brend.'</td>
                    <td class="center">'.$proizvod->opis.'</td>
                    <td class="center">'.$proizvod->id_ka.'</td>`
                    <td><input class="btn btn-primary btn-md updateProizvod" data-id="'.$proizvod->id_p.'" type="button" value="update"/> &nbsp;
                    <input class="btn btn-danger btn-md obrisiProizvod" data-id="'.$proizvod->id_p.'" type="button" value="delete"/></td>
                </tr>';
                }
                
                $ispis .= "</tbody>";
                echo $ispis;
        } else {
            echo "Baza trenutno nije dostupna";
        }

    }
?>