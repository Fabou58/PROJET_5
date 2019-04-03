<h1>Ajouter une visite :</h1>
	<form class='visite' action="ajout_visite.php" method="post">
		Libellé :<input name="libelle" ></input></br>
		Prix<input name="prix" ></input></br>
		Surface<input name="surface" ></input></br>
		Etat<input name="etat" ></input></br>
		Agence<input name="agence" ></input></br>
		Adresse :<select name="id_adresse">
		<?php 
			$adresse = Adresse::getAll(); 
			foreach($adresse as $adresse): 
		?>
			<option value="<?=$adresse['id_adresse']?>"><?=$adresse['num_rue']?> <?=$adresse['nom_rue']?> <?=$adresse['ville']?></option>
		<?php 
			endforeach; 
		?>
		</select></br>
		Type de vente :<select name="id_typeVente">
		<?php 
			$typeVente = TypeVente::getAll(); foreach($typeVente as $typeVente): 
		?>
			<option value="<?=$typeVente['id_type_vente']?>"><?=$typeVente['libelle']?></option>
		<?php 
			endforeach; 
		?>
		</select></br>
		Type de bien :<select name="id_typeBien">
		<?php 
			$typeBien = TypeBien::getAll(); foreach($typeBien as $typeBien): 
		?>
			<option value="<?=$typeBien['id_type_bien']?>"><?=$typeBien['libelle']?></option>
		<?php 
			endforeach; 
		?>
		</select></br>
		Description<input type="text" name="description" ></input></br>
		<p><input type="submit" value="Envoyer"></input></p>
	</form>