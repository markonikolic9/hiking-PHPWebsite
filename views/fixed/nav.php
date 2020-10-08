<div class="banner-bg banner-bg1">	
	  <div class="container">
			 <div class="header">
			       <div class="logo">
						 <a href="<?=BASE_URL?>index.php"><img src="<?=BASE_URL?>vendor/images/logo.png" alt=""/></a>
				   </div>							 
				  <div class="top-nav">										 
						<label class="mobile_menu" for="mobile_menu">
						<span>Menu</span>
						</label>
						<input id="mobile_menu" type="checkbox">

						<?php
					
					include "config/connection.php";
					$prikaz=0;
					if(isset($_SESSION['korisnik'])){
						if($_SESSION['korisnik']->id_u == 1){
							$prikaz = 2;
						} else {
							$prikaz = 1;
						}
					}

					switch($prikaz){
						case 0:
							$upit = "SELECT * FROM navmeni where prikaz = 0 or prikaz = 1";
							break;
						case 1:
							$upit = "SELECT * FROM navmeni where prikaz = 0 or prikaz = 2";
							break;
						case 2:
							$upit = "SELECT * FROM navmeni where prikaz = 0 or prikaz = 2 or prikaz = 3";
							break;
						default:
							$upit = "SELECT * FROM glavnimeni where prikaz = 0 or prikaz = 1";
							break;
					}

					$navmeni = $conn->query($upit)->fetchAll();

				
					$item = "<ul class='nav'>";

					foreach($navmeni as $x){
						if($x->parent == null){
							$item .= "<li class='dropdown1'><a href='".BASE_URL.$x->putanja."'>".$x->naziv."</a>";
							$idParent = $x->id_n;
							switch($prikaz){
								case 0:
									$upit1 = "SELECT * FROM navmeni where parent = $idParent and (prikaz = 0 or prikaz = 1)";
									break;
								case 1:
									$upit1 = "SELECT * FROM navmeni where parent = $idParent and (prikaz = 0 or prikaz = 2)";
									break;
								case 2:
									$upit1 = "SELECT * FROM navmeni where parent = $idParent and (prikaz = 0 or prikaz = 2 or prikaz = 3)";
									break;
								default:
									$upit1 = "SELECT * FROM navmeni where parent = $idParent and (prikaz = 0 or prikaz = 1)";
									break;
							}
							

							$x2 = $conn->query($upit1);
							
							
							if($x2->rowCount()==0){
								$item .= "</li>";
							} else {
								$navmeni2= $x2 -> fetchAll();
								$item .= "<ul>";

								foreach ($navmeni2 as $podaci){
									$item .= "<li><a href='".BASE_URL.$podaci->putanja."'>".$podaci->naziv."</a></li>";
								}
								$item .= "</ul></li>";
							}
						}
					}
					echo $item;
				?> 

							<?php
							if(isset($_SESSION['korisnik'])){
								if($_SESSION['korisnik']->id_u == 1 || $_SESSION['korisnik']->id_u == 2){ ?>
									<a class="shop" href='<?=BASE_URL?>index.php?page=korpa'><img src='<?=BASE_URL?>vendor/images/cart.png' alt=""/></a>
									<?php	}
							 }
						
							?>
				 </div>
				 <div class="clearfix"></div>
			 </div>
	  </div>