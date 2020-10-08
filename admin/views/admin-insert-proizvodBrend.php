<?php

$upit = "SELECT * FROM brend";
$brend = $conn->query($upit)->fetchAll();

?>

<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Brand Change</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Brend
                        </div>
                        <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID_B</th>
                                        <th>Naziv</th>
                                        <th>Kontrole</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($brend as $b): ?>
                                    <tr class="odd gradeX">
                                        <td class="center"><?= $b->id_b;?></td>
                                        <td class="center"><?= $b->naziv_brend;?></td>
                                        <td><input class="btn btn-danger btn-md obrisiBrend" data-id="<?= $b->id_b;?>" type="button" value="delete"/></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                            </div>
                            </div>
                            <div id="ispisiOvde" class="row">
                            <div class="col-lg-12">
                                    <h1 id="naslovForma">Dodaj novi brend</h1>
                                    <form id="forma" role="form">
                                        <div class="form-group">
                                            <label>Naziv</label>
                                            <input type="text" id="tNaziv" class="form-control" placeholder="Unesite naziv brenda">
                                        </div>
                                        <div class="form-group">
                                            <input type="button" id="brendInsert" class="btn btn-primary btn-md" value="INSERT">
                                        </div>
                                        <label id="insertBrend"> </label>
                                        
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