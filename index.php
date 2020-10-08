<?php
	session_start();
	include "config/config.php";
	include "views/fixed/head.php";
	include "views/fixed/nav.php";

	if(isset($_GET['page']))
	{
		switch($_GET['page'])
		{

			case "oprema" :
				include 'views/pages/oprema.php';
				break;
			case "registracija": 
				include "views/pages/registracija.php";
				break;
			case "home":				
				include "views/pages/banner.php";
				include "views/pages/home.php";
				break;
			case "logovanje":
				include "views/pages/logovanje.php";
				break;
			case "korpa":
				include "views/pages/korpa.php";
				break;
			case "kupovina":
				include "views/pages/kupovina.php";
				break;
			case "proizvod":
				include "views/pages/proizvod.php";
				break;
			default: 				
			include "views/pages/banner.php";
			include "views/pages/home.php";
			break;
		}
	}
	else
	{
		include "views/pages/banner.php";
		include "views/pages/home.php";
	}
	include "views/fixed/footer.php";
?>

