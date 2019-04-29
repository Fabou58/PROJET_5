<?php
	require_once("./conf/top.php");
	require_once("./templates/header.tpl.php");
	require_once("./templates/ajout_visite.tpl.php");
	require_once("./templates/footer.tpl.php");
	require_once("verification_adresse.php");
	
	if (	isset($_REQUEST["libelle"]) && 
			isset($_REQUEST["description"]) && 
			isset($_REQUEST["prix"]) && 
			isset($_REQUEST["surface"]) && 
			isset($_REQUEST["etat"]) && 
			isset($_REQUEST["agence"]) && 
			$_REQUEST["libelle"]!=null && 
			$_REQUEST["prix"]!=null && 
			$_REQUEST["surface"]!=null && 
			$_REQUEST["etat"]!=null && 
			$id_adresse !=0 && 
			$_REQUEST["id_typeVente"] !=0 && 
			$_REQUEST["id_typeBien"] !=0)
	{
		$libelle= $_REQUEST["libelle"];
		$description = $_REQUEST["description"];
		$prix = $_REQUEST["prix"];
		$surface = $_REQUEST["surface"];
		$etat = $_REQUEST["etat"];
		$agence = $_REQUEST["agence"];
		$id_typeVente = $_REQUEST["id_typeVente"];
		$id_typeBien = $_REQUEST["id_typeBien"];
		
		if(Visite::existe($libelle, $prix, $surface))
		{
			echo"La visite ".$libelle." existe déjà!";
		}
		else
		{
			Visite::ajouter($libelle, $description, $prix, $surface, $etat, $agence, $id_adresse, $id_typeVente, $id_typeBien);
			echo"La visite ".$libelle." a bien été ajoutée!";
		}
	}
?>