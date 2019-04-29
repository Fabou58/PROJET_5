<?php 	
	$id_visite = $_GET["id_visite"];
	$visite = new Visite($id_visite);
?> 

<h1>Modifier une visite :</h1>
	<form class='visite' action="modification_visite.php?id_visite=<?=$id_visite?>" method="post">
		Libellé :<input name="libelle" value="<?=$visite->getLibelle()?>"></input></br>
		Prix<input name="prix" value="<?=$visite->getPrix()?>"></input></br>
		Surface<input name="surface" value="<?=$visite->getSurface()?>"></input></br>
		Etat<input name="etat" value="<?=$visite->getEtat()?>"></input></br>
		Agence<input name="agence" value="<?=$visite->getAgence()?>"></input></br>
		Adresse<input name="adresse" value="<?=$visite->getAdresse()?>"></input></br>
		
		Type de vente :<select name="id_typeVente">
		<?php 
			$typeVente = TypeVente::getAll(); 
			foreach($typeVente as $typeVente): 
			if($visite->getTypeVente() == $typeVente['libelle'])
			{
		?>
			<option value="<?=$typeVente['id_type_vente']?>" selected><?=$typeVente['libelle']?></option>
		<?php
			}
			else
			{
		?>
			<option value="<?=$typeVente['id_type_vente']?>"><?=$typeVente['libelle']?></option>
		<?php 
			}
			endforeach; 
		?>
		</select></br>
		
		Type de bien :<select name="id_typeBien">
		<?php 
			$typeBien = TypeBien::getAll(); 
			foreach($typeBien as $typeBien): 
			if($visite->getTypeBien() == $typeBien['libelle'])
			{
		?>
			<option value="<?=$typeBien['id_type_bien']?>" selected><?=$typeBien['libelle']?></option>
		<?php
			}
			else
			{
		?>
			<option value="<?=$typeBien['id_type_bien']?>"><?=$typeBien['libelle']?></option>
		<?php 
			}
			endforeach; 
		?>
		</select></br>
		
		Description<input type="text" name="description" value="<?=$visite->getDescription()?>"></input></br>
		<p><input type="submit" value="Envoyer"></input></p>
	</form>
		
	<form action="index.php">
		<p><input type="submit" value="Retour"></input></p>
	</form>