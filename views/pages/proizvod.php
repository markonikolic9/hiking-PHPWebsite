<?php

if(isset($_GET['id'])){

    $id = $_GET['id'];

        include "models/functions/functionProizvod.php";

        $proizvod = dohvatiProizvod($id);
        //var_dump($proizvod);

} else {

}
?>
<div class="product">
    <div class="container container1">
        <div class="ctnt-bar cntnt">
                <div class="content-bar">
                <div class="product-head">
                    <a href="index.php">Početna</a> <span></span>
                </div>
                <div class="details-left-slider">
                    <div class="grid images_3_of_2">
                <ul id="etalage">
 			<li>
 				<img class="etalage_thumb_image" src=<?= $proizvod->putanja ?> class="img-responsive" />
 				<img class="etalage_source_image" src=<?= $proizvod->putanja ?> class="img-responsive" title="" />
 			</li>
 		</ul>
 	</div>
 </div>
 <div class="details-left-info">
 	<h3><?= $proizvod->naziv ?></h3>
 	<h4></h4>
 	<p><label><?= $proizvod->cena ?> Din </label></p>
 		<div class="btn_form">
 			<a href="#" class="dodajUKorpu" data-id="<?= $proizvod->id_p ?>">Dodaj u korpu</a>
 		</div>
 		<div class="bike-type">
			<p>Kategorija: <?= $proizvod->naziv_kategorija ?></p>
			<p>Brend: <?= $proizvod->naziv_brend ?></p>
		</div>
		<h5>Opis</h5>
		<p class="desc"><?= $proizvod->opis ?></p>
 	</div>
 	<div class="clearfix"></div>
 </div>

