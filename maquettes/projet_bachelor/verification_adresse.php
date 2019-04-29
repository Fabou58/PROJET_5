<?php
	$numRue ="";
	$nomRue ="";
	$ville ="";
	$id_adresse=0;
	
	if(isset($_REQUEST["adresse"]) && $_REQUEST["adresse"]!=null)
	{	
		$adresse = $_REQUEST["adresse"];
		$tab = explode(" (", $adresse, 2);
		if(!isset($tab[1]))
		{
			$tab[1] = "";
		}
		$ville = str_replace(")", "", $tab[1]);
		$adresse = $tab[0];
		$tab = explode(" ", $adresse, 2);
		$numRue = $tab[0];
		$nomRue = $tab[1];
		
		if(Adresse::existe($numRue, $nomRue, $ville))
		{
			$result = Adresse::getID($numRue, $nomRue, $ville);
			$id_adresse = $result[0]['id_adresse'];
		}
		else if(isset($numRue) && $numRue !="" && isset($nomRue) && $nomRue!="" && isset($ville) && $ville!="")
		{
			Adresse::ajouter($numRue, $nomRue, $ville);
			$result = Adresse::getID($numRue, $nomRue, $ville);
			$id_adresse = $result[0]['id_adresse'];
		}
		else
		{
			echo "Veuillez entrer une adresse valide";
		}
	}
?>