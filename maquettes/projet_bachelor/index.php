<?php
	require_once('conf/top.php');
	
	$visites = Visite::getAll();
 
	include('templates/header.tpl.php'); 
	include('templates/list_visites.tpl.php'); 
	include('templates/footer.tpl.php');
?>