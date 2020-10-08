<?php

    $upit = "SELECT * FROM korisnik k INNER JOIN uloga u ON k.id_u=u.id_u";
    $korisnici = $conn->query($upit)->fetchAll();

?>

<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users Change</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Korisnici
                        </div>
                        <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID_K</th>
                                        <th>Ime</th>
                                        <th>Prezime</th>
                                        <th>Email</th>
                                        <th>Uloga</th>
                                        <th>Kontrole</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($korisnici as $korisnik): ?>
                                    <?php ?>
                                    <tr class="odd gradeX">
                                        <td><?= $korisnik->id_k;?></td>
                                        <td><?= $korisnik->ime;?></td>
                                        <td><?= $korisnik->prezime;?></td>
                                        <td class="center"><?= $korisnik->email;?></td>
                                        <td class="center"><?= $korisnik->naziv;?></td>
                                        <td><input class="btn btn-primary btn-md updateKorisnik" data-id="<?= $korisnik->id_k;?>" type="button" value="update"/> &nbsp;
                                        <input class="btn btn-danger btn-md obrisiKorisnik" data-id="<?= $korisnik->id_k;?>" type="button" value="delete"/></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            </div>
                            </div>
                            <div id="ispisForme" class="row">
                                
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