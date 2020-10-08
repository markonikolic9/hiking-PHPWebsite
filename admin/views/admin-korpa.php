<?php

    $upit = "SELECT ko.ime, ko.prezime, ko.adresa, ko.telefon, p.naziv, ko.cena, ko.vreme FROM korisnik k INNER JOIN korpa ko ON k.id_k=ko.id_k INNER JOIN proizvodi p ON ko.id_p=p.id_p";
    $korpa = $conn->query($upit)->fetchAll();
?>

<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All orders</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Korpa
                        </div>
                        <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Ime</th>
                                        <th>Prezime</th>
                                        <th>Adresa</th>
                                        <th>Broj telefona</th>
                                        <th>Naziv proizvoda</th>
                                        <th>Cena</th>
                                        <th>Datum kupovine</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($korpa as $jednaKupovina): ?>
                                    <?php $vremeKupovine=date("d-m-Y h:i:s",$jednaKupovina->vreme); ?>
                                    <tr class="odd gradeX">
                                        <td><?= $jednaKupovina->ime;?></td>
                                        <td><?= $jednaKupovina->prezime;?></td>
                                        <td><?= $jednaKupovina->adresa;?></td>
                                        <td class="center"><?= $jednaKupovina->telefon;?></td>
                                        <td class="center"><?= $jednaKupovina->naziv;?></td>
                                        <td class="center"><?= $jednaKupovina->cena;?></td>
                                        <td class="center"><?= $vremeKupovine;?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                            </div>
                            </div>
                            <div id="ispis" class="row">
                                
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