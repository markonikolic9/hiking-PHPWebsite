<?php

		if(isset($_GET['kategorija'])){

			require "config/connection.php";

			$kategorija = $_GET['kategorija'];

			include "models/functions/functionKategorija.php";

			$proizvodi = dohvatiProizvodePoKategoriji($kategorija);

			$nazivKategorija = dohvatiKategoriju($kategorija);
			$nazivKategorija = $nazivKategorija->naziv_kategorija;

			?>
			<div class="bikes">
				<div class="mountain-sec">
					<h2><?=$nazivKategorija?></h2>
			<?php
				foreach($proizvodi as $proizvod):
			?>
				<a href="index.php?page=proizvod&id=<?= $proizvod->id_p ?>">
						<div class="bike">
						 	<img src="<?= $proizvod->putanja ?>" alt="<?= $proizvod->alt ?>"/>
							 	<div class="bike-cost">
								 	<div class="bike-mdl">
									 	<h4>NAZIV<span><?= $proizvod->naziv ?></span></h4>
								 	</div>
								 	<div class="bike-cart">
									 	<a class="buy" href=index.php?page=proizvod&id=<?= $proizvod->id_p ?>>Pogledaj</a>
								 	</div>
								 	<div class="clearfix"></div>
								</div>
						</div>
				</a>
			<?php	endforeach; ?>
				<div class="cleaner"></div>
				</div>
				</div>
			</div>
<?php

include "models/functions/functionPaginacija.php";
$broj = 4;
$number = brojProizvodaPoKategoriji($kategorija);

$brojStrana = ceil($number->broj/$broj);

?>

<div id ="stranicenje" class="paginacija">
	<?php
		for($i=0; $i<$brojStrana;$i++):
			$index = $i+1;
	?>
			<span id="<?= $i ?>" data-id="<?= $kategorija ?>" class='brojStrana'><?= $index ?></span>
	<?php endfor; ?>
	<div class='cleaner'></div>
</div>

<?php } ?>