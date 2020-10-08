<div class="cart">
	 <div class="container container1">
		 <div class="cart-top">
			<a href="index.php"><< home</a>
		 </div>	
			
		 <div class="col-md-9 cart-items">
			 <h2>VAŠA KORPA</h2>

             <?php
             if(isset($_SESSION['oprema'])){

             $nizOpreme = $_SESSION['oprema'];
             if(empty($nizOpreme)){
                 $ukupnaCena = 0;
                 echo "<h2>Nije ništa poručeno!</h2>";
             } else {

             include "models/functions/functionProizvod.php";

             $ispis = '';
             $ukupnaCena = 0;
             foreach ($nizOpreme as $opremaId):

             $oprema = dohvatiProizvod($opremaId);
             $ukupnaCena+=$oprema->cena;?>

             <div class="cart-header">
                 <div class="close1" data-id="<?=$oprema->id_p?>"></div>
                 <div class="cart-sec">
                        <div class="cart-item cyc">
                            <img src="<?=$oprema->putanja?>"/>
                        </div>
                        <div class="cart-item-info">
                            <h3><?= $oprema->naziv ?><span><?=$oprema->naziv_brend?></span></h3>
                            <h4><span>Din. </span><?=$oprema->cena?></h4>
                        </div>
                 </div>
                 <div class="clearfix"></div>
            </div>

         <?php endforeach; ?>
         <?php    }
         }else{
             echo "<h2>Nemate nista poruceno!</h2>";
             $ukupnaCena = 0;
         }

         ?>

     </div>
		 
		 <div class="col-md-3 cart-total">
			 <div class="price-details">
				 <h2>Detalji korpe</h2>	
				 <div class="clearfix"></div>				 
			 </div>	
			 <h4 class="last-price">Ukupno</h4>
			 <span class="total final"><?=$ukupnaCena?> Din</span>
			 <div class="clearfix"></div>
			 <a class="order" href="index.php?page=kupovina">KUPI</a>

			</div>
	 </div>
</div>
</div>
</div>


