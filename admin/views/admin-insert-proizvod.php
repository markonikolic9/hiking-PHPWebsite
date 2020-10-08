<?php

    $upitProizvod = "SELECT * FROM proizvodi p INNER JOIN brend b ON p.id_b=b.id_b INNER JOIN kategorija k ON p.id_ka=k.id_ka";
    $proizvodi = $conn->query($upitProizvod)->fetchAll();

    $upitBrend = "SELECT * FROM brend";
    $brend = $conn->query($upitBrend)->fetchAll();

    $upitKategorija = "SELECT * FROM kategorija";
    $kategorije = $conn->query($upitKategorija)->fetchAll();
    
?>

<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product Change</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Proizvodi
                        </div>
                        <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID_P</th>
                                        <th>Naziv</th>
                                        <th>Slika</th>
                                        <th>ID_B</th>
                                        <th>Brend</th>
                                        <th>Cena</th>
                                        <th>Opis</th>
                                        <th>ID_K</th>
                                        <th>Kategorija</th>
                                        <th>Kontrole</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($proizvodi as $proizvod): ?>
                                    <tr class="odd gradeX">
                                        <td><?= $proizvod->id_p;?></td>
                                        <td><?= $proizvod->naziv;?></td>
                                        <td class="center"><img  width="50px" src="../../<?= $proizvod->putanja;?>" alt="<?= $proizvod->alt;?>"/></td>
                                        <td class="center"><?= $proizvod->id_b;?></td>
                                        <td class="center"><?= $proizvod->naziv_brend;?></td>
                                        <td class="center"><?= $proizvod->cena;?></td>
                                        <td class="center"><?= $proizvod->opis;?></td>
                                        <td class="center"><?= $proizvod->id_ka;?></td>
                                        <td class="center"><?= $proizvod->naziv_kategorija;?></td>
                                        <td><input class="btn btn-primary btn-md updateProizvod" data-id="<?= $proizvod->id_p;?>" type="button" value="update"/> &nbsp;
                                        <input class="btn btn-danger btn-md obrisiProizvod" data-id="<?= $proizvod->id_p;?>" type="button" value="delete"/></td>
                                    </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 id="naslov">Dodaj novi proizvod</h1>
                                    <form id="noviProizvod" method="POST" action="../php/admin-insertProizvod.php"  role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Naziv</label>
                                            <input type="text" name="tbNaziv" id="tbNaziv" class="form-control" placeholder="Unesite naziv proizvoda" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Cena</label>
                                            <input type="text" name="tbCena"  id="tbCena" class="form-control" placeholder="Unesite cenu proizvoda" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Slika</label>
                                            <input type="file" name="fajlSlika"  id="fajlSlika" class="form-control" placeholder="Unesite naziv slike" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alt slike</label>
                                            <input type="text" name="slikaAlt" id="slikaAlt" class="form-control" placeholder="Unesite alt slike" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Opis proizvoda</label>
                                            <textarea placeholder="" name="txtOpis" id="txtOpis" class="form-control" required>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Brend </label>
                                            <select name="ddlBrend" id="ddlBrend" class="form-control">
                                            <option value="0">Izaberite</option>
                                                <?php foreach($brend as $b): ?>
                                                    <option value="<?=$b->id_b;?>"><?=$b->naziv_brend;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategorija </label>
                                            <select name="ddlKategorija" id="ddlKategorija" class="form-control">
                                            <option value="0">Izaberite</option>
                                                <?php foreach($kategorije as $kategorija): ?>
                                                    <option value="<?=$kategorija->id_ka;?>"><?=$kategorija->naziv_kategorija;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        
                                        <div class="form-group">
                                            <input type="submit" name="insertProizvod" id="insertProizvod" class="btn btn-primary btn-md" value="INSERT">
                                        </div>
                                        <label id="ispisProizvoda"> </label>
                                        
                                    </form>
                                </div>
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->