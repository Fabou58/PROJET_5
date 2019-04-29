<?php
	class Visite
	{ 
		private $id; 
		private $libelle; 
		private $description; 
		private $prix; 
		private $surface;
		private $etat;
		private $agence;
		private $id_adresse;
		private $id_typeVente;
		private $id_typeBien;
	   
		public function __construct($id = '')
		{ 	
			if ($id != '') 
			{ 
				$this->id = $id; 
				$this->load(); 
			} 
		} 
	   
		public function load() 
		{ 
			if (isset($this->id)) 
			{ 
				$db = Database::getInstance(); 
				$sql = 'SELECT * FROM visite WHERE id_visite = "'.$this->id.'"'; 
				if ($result = $db->fetch($sql))
				{ 
					$this->libelle= $result[0]['libelle'];
					$this->description= $result[0]['description'];
					$this->prix= $result[0]['prix'];
					$this->surface= $result[0]['surface'];
					$this->etat= $result[0]['etat'];
					$this->agence= $result[0]['agence'];
					$this->id_adresse= $result[0]['id_adresse'];
					$this->id_typeVente= $result[0]['id_type_vente'];
					$this->id_typeBien= $result[0]['id_type_bien'];
					return true; 
				} 
				return false; 
			} 
		}
		
		public static function existe($libelle, $prix, $surface)
		{
			$db = Database::getInstance();
			$sql = 'SELECT * FROM visite WHERE libelle="'.$libelle .'" AND prix='.$prix .' AND surface='.$surface; 
			if ($result = $db->fetch($sql))
			{ 
				return true;
			}
			else
			{
				return false;
			}
		}
		
		public static function getAll()
		{
			$db = Database::getInstance(); 
			$sql = 'SELECT * FROM visite'; 
			if ($result = $db->fetch($sql))
			{ 
				return $result; 
			} 
			return false; 
		}
		
		public function __toString()
		{ 
			return $this->libelle.' ('.$this->surface.') - '.$this->prix; 
		} 
		
		// GET
		public function getLibelle()
		{
			return $this->libelle;
		}
		
		public function getDescription()
		{
			return $this->description;
		}
		
		public function getPrix()
		{
			return $this->prix;
		}
		
		public function getSurface()
		{
			return $this->surface;
		}
		
		public function getEtat()
		{
			return $this->etat;
		}
		
		public function getAgence()
		{
			return $this->agence;
		}
		
		public function getAdresse()
		{
			$adresse = new Adresse($this->id_adresse);
			return $adresse;
		}
		
		public function getTypeVente()
		{
			$typeVente = new TypeVente($this->id_typeVente);
			return $typeVente;
		}
		
		public function getTypeBien()
		{
			$typeBien = new TypeBien($this->id_typeBien);
			return $typeBien;
		}
		
		// AJOUT
		public static function ajouter($libelle, $description, $prix, $surface, $etat, $agence, $id_adresse, $id_typeVente, $id_typeBien)
		{
			$db = Database::getInstance();
			$sql = 'INSERT INTO projet_bachelor.visite (libelle, description, prix, surface, etat, agence, id_adresse, id_type_vente, id_type_bien) VALUES ("'.$libelle.'","'.$description.'",'.$prix.','.$surface.',"'.$etat.'","'.$agence.'",'.$id_adresse.','.$id_typeVente.','.$id_typeBien.');';
			$db->exec($sql);
		}
		
		// MODIFICATION
		public function modifier($libelle, $description, $prix, $surface, $etat, $agence, $id_adresse, $id_typeVente, $id_typeBien)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE visite SET 	
				libelle = "'.$libelle.'", 
				description = "'.$description.'", 
				prix = '.$prix.', 
				surface = '.$surface.', 
				etat = "'.$etat.'", 
				agence = "'.$agence.'", 
				id_adresse = '.$id_adresse.', 
				id_type_vente = '.$id_typeVente.', 
				id_type_bien = '.$id_typeBien.' 
				
			WHERE id_visite = ' .$this->id;
			$db->exec($sql);
		}
		
		// SUPPRESSION
		public function supprimer()
		{
			$db = Database::getInstance();
			$sql = 'DELETE FROM visite				
			WHERE id_visite = ' .$this->id;
			$db->exec($sql);
		}
		
		// PROTEGER ABSOLUMENT CONTRE LES INJECTIONS!!!
		// FONCTION A RETRAVAILLER!!!
		/*
		public static Function rechercher($libelle="",$surface="")
		{
			$db = Database::getInstance();
			$titre = str_replace("*","%",$titre);
			
			if($titre != "" && $annee != "")
			{
				$sql = 'SELECT * FROM film WHERE titre LIKE"'.$titre.'" AND annee="'.$annee.'"';
				$result = $db->fetch($sql);
			}
			else if($titre !="")
			{
				$sql = 'SELECT * FROM film WHERE titre LIKE"'.$titre.'";';
				$result = $db->fetch($sql);
			}
			else if($annee !="")
			{
				$sql = 'SELECT * FROM film WHERE annee = "'.$annee.'";';
				$result = $db->fetch($sql);
			}
			return $result;
		}*/
		
		// SET
		public function setLibelle($libelle)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE visite SET libelle = "'.$libelle.'" WHERE id_visite = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setDescription($libelle)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE visite SET description = "'.$description.'" WHERE id_visite = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setPrix($prix)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE visite SET prix = "'.$prix.'" WHERE id_visite = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setSurface($surface)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE visite SET surface = "'.$surface.'" WHERE id_visite = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setEtat($etat)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE visite SET etat = "'.$etat.'" WHERE id_visite = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setAgence($agence)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE visite SET agence = "'.$agence.'" WHERE id_visite = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setAdresse($id_adresse)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE visite SET id_adresse = "'.$id_adresse.'" WHERE id_visite = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setTypeVente($id_typeVente)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE visite SET id_typeVente = "'.$id_typeVente.'" WHERE id_visite = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setTypeBien($id_typeBien)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE visite SET id_typeBien = "'.$id_typeBien.'" WHERE id_visite = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
	} 
?>