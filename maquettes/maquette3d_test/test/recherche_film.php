<?php
	require_once("/conf/top.php");
	require_once("/templates/header.tpl.php");
	require_once("/templates/recherche_film.php");
	require_once("/templates/footer.tpl.php");
	
	if (isset($_REQUEST["titre"]) OR isset($_REQUEST["annee"]))
	{
	  $titre = $_REQUEST["titre"];
	  $annee = $_REQUEST["annee"];
	  $films = Film::rechercher($titre, $annee);
	  require_once("/templates/list_films.tpl.php");
	}
?>
