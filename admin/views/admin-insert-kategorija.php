i<?php

$upit = "SELECT * FROM kategorija";
$kategorije = $conn->query($upit)->fetchAll();

?>

<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Categories Change</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Kategorije
                        </div>
                        <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID_KA</th>
                                        <th>Naziv</th>
                                        <th>Kontrole</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($kategorije as $kategorija): ?>
                                    <tr class="odd gradeX">
                                        <td class="center"><?= $kategorija->id_ka;?></td>
                                        <td class="center"><?= $kategorija->naziv_kategorija;?></td>
                                        <td><input class="btn btn-danger btn-md obrisiKategorija" data-id="<?= $kategorija->id_ka;?>" type="button" value="delete"/></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                            </div>
                            </div>
                            <div id="ispisiOvde" class="row">
                            <div class="col-lg-12">
                                    <h1 id="naslovForma">Dodaj novu kategoriju</h1>
                                    <form id="forma" role="form">
                                        <div class="form-group">
                                            <label>Naziv</label>
                                            <input type="text" id="tbNazivKat" class="form-control" placeholder="Unesite naziv kategorije">
                                        </div>
                                        <div class="form-group">
                                            <input type="button" id="kategorijaInsert" class="btn btn-primary btn-md" value="INSERT">
                                        </div>
                                        <label id="insertKategorija"> </label>
                                        
                                    </form>
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