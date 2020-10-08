<!---->
<div class="footer">
	 <div class="container wrap">
		<div class="logo2">
			 <a href="index.php"><img src="vendor/images/logo.png" alt=""/></a>
		</div>
         <div class="lindedinProfil">
             <a target ="_blank" href="https://www.linkedin.com/in/marko-nikolić-10098a1a2/">&copy Marko Nikolić 2020</a>
         </div>
		<div class="clearfix"></div>
	 </div>
</div>
<!---->
<!--banner-->
<script type="text/javascript" src="vendor/js/registracijaScript.js"></script>
<script type="text/javascript" src="vendor/js/logovanjeScript.js"></script>
<script type="text/javascript" src="vendor/js/paginacija.js"></script>
<script type="text/javascript" src="vendor/js/dodajUKorpu.js"></script>
<script type="text/javascript" src="vendor/js/izbacivanjeIzSesije.js"></script>
<script type="text/javascript" src="vendor/js/naruci.js"></script>

<script src="vendor/js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 400,
					thumb_image_height: 400,
					source_image_width: 800,
					source_image_height: 1000,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>

				<script>
					$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>

			<script>
				$(document).ready(function(c) {
					$('.close2').on('click', function(c){
							$('.cart-header2').fadeOut('slow', function(c){
						$('.cart-header2').remove();
					});
					});	  
					});
			 </script>	

<script src="vendor/js/responsiveslides.min.js"></script>
<script>  
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
</body>
</html>