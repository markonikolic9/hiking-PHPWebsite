<?php if(!isset($_SESSION['oprema'])){
header('location:index.php');
}?>
<div class="contact">
	<div class="container">
		<h3>Popunite podatke za kupovinu</h3>
		<form>
			 <input type="text" placeholder="Ime" name='tIme' id='tIme' required="">
			 <input type="text" placeholder="Prezime" id='tPrezime' name='tPrezime' required="">			 
             <input class="user" type="text" placeholder="Adresa" id='tbAdresa' name='tbAdresa' required=""><br>
             <input class="user" type="text" placeholder="Broj telefona" id='tbTelefon' name='tbTelefon' required=""><br>
			 <input type="button" name="btnKupi" id="btnKupi" value="KUPI">
        </form>
        <span id="poruka"></span>
	</div>
</div>
</div>

