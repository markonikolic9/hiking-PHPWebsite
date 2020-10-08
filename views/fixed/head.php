<!DOCTYPE html>
<html>
<head>
<title>HiKing</title>
<link href="<?= BASE_URL ?>vendor/css/bootstrap.css" rel='stylesheet' type='text/css' />
<script src="<?=  BASE_URL ?>vendor/js/jquery.min.js"></script>
<link href="<?=  BASE_URL ?>vendor/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?=  BASE_URL ?>vendor/css/etalage.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css'>
<?php
	if(isset($_GET['page']))
	{
		if($_GET['page']=="registracija" || $_GET['page']=="logovanje") echo "<link href='".BASE_URL."vendor/css/styleRegistracija.css' rel='stylesheet' type='text/css' media='all'/>";
	}
?>
<script src="<?=  BASE_URL ?>vendor/js/jquery.easydropdown.js"></script>
<link href="<?=  BASE_URL ?>vendor/css/nav.css" rel="stylesheet" type="text/css" media="all"/>
		<script type="text/javascript" src="<?=  BASE_URL ?>vendor/js/move-top.js"></script>
		<script type="text/javascript" src="<?=  BASE_URL ?>vendor/js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
		</script>

</head>
<body>