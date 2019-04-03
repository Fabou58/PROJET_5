<div id='listing'> 
	<?php 
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
	<?php endforeach; ?> 
</div>