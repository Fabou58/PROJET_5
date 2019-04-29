<?php
	require_once("./conf/top.php");
	require_once("./templates/header.tpl.php");
	require_once("./templates/modification_visite.tpl.php");
	require_once("./templates/footer.tpl.php");
	require_once("verification_adresse.php");
	
	if (	isset($_REQUEST["libelle"]) && 
			isset($_REQUEST["description"]) && 
			isset($_REQUEST["prix"]) && 
			isset($_REQUEST["surface"]) && 
			isset($_REQUEST["etat"]) && 
			isset($_REQUEST["agence"]) && 
			$id_adresse != 0 &&
			$_REQUEST["id_typeVente"] !=0 && 
			$_REQUEST["id_typeBien"] !=0)
	{
		$id_typeVente = $_REQUEST["id_typeVente"];
		$id_typeBien = $_REQUEST["id_typeBien"];
		
		$tv = new TypeVente($id_typeVente);
		$tb = new TypeBien($id_typeBien);
		
		if(	$_REQUEST["libelle"] != $visite->getLibelle() ||
			$_REQUEST["description"] != $visite->getDescription() ||
			$_REQUEST["prix"] != $visite->getPrix() ||
			$_REQUEST["surface"] != $visite->getSurface() ||
			$_REQUEST["etat"] != $visite->getEtat() ||
			$_REQUEST["agence"] != $visite->getAgence() ||
			$_REQUEST["adresse"] != $visite->getAdresse() ||
			$tv != $visite->getTypeVente() ||
			$tb != $visite->getTypeBien())
		{
			$libelle= $_REQUEST["libelle"];
			$description = $_REQUEST["description"];
			$prix = $_REQUEST["prix"];
			$surface = $_REQUEST["surface"];
			$etat = $_REQUEST["etat"];
			$agence = $_REQUEST["agence"];
			
			$visite->modifier($libelle, $description, $prix, $surface, $etat, $agence, $id_adresse, $id_typeVente, $id_typeBien);
			echo"La visite ".$libelle." a bien été modifiée!";
		}
		else
		{
			echo"Pour modifier cette visite, vous devez changer au minimum un champ";
		}
	}
?>