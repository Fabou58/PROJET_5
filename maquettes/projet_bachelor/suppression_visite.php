<?php
	require_once("./conf/top.php");
	require_once("./templates/header.tpl.php");
	require_once("./templates/suppression_visite.tpl.php");
	require_once("./templates/footer.tpl.php");
	
	$id_visite = $_REQUEST["id_visite"];
	$visite = new Visite($id_visite);
	
	$visite->supprimer();
	echo"La visite ".$visite->getLibelle()." a bien été supprimée!";
?>