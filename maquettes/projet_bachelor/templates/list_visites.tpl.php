<div id='listing'> 
	<?php 
	if($visites!=null)
	{
		foreach($visites as $visite): 
		$v = new Visite($visite['id_visite']);
	?> 
		<table class='visite'> 
			<thead> 
				<caption><?=$visite['libelle']?></caption>
			</thead>
			<tbody>
				<tr class='top_tab'>
					<th>Prix</th>
					<th>Surface</th>
					<th>Etat</th>
					<th>Agence</th>
					<th>Adresse</th>
					<th>Type de vente</th>
					<th>Type de bien</th>
					<th>Description</th>
				</tr>
				<tr>
					<td><?=$visite['prix']?></td>
					<td><?=$visite['surface']?></td>
					<td><?=$visite['etat']?></td>
					<td><?=$visite['agence']?></td>
					<td><?=$v->getAdresse()?></td>
					<td><?=$v->getTypeVente()?></td>
					<td><?=$v->getTypeBien()?></td>
					<td><?=$visite['description']?></td>
				</tr>
			</tbody>
		</table>
		
		<form  class='visite' action="visite.php" method="post">
			<p><input type="submit" value="Visiter"></input></p>
		</form>
		
		<form  class='visite' action="modification_visite.php?id_visite=<?=$visite['id_visite']?>" method="post">
			<p><input type="submit" value="Mofidier"></input></p>
		</form>
		
		<form  class='visite' action="suppression_visite.php" method="post">
			<input name="id_visite" value="<?=$visite['id_visite']?>" style="display:none"></input>
			<p><input type="submit" value="Supprimer"></input></p>
		</form>
	<?php 
		endforeach; 
	}
	?> 
	
		<form action="ajout_visite.php">
			<p><input type="submit" value="Nouvelle visite"></input></p>
		</form>
</div>