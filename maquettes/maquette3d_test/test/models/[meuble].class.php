<?php
	class Meuble
	{ 
		private $id; 
		private $libelle; 
		private $longueur; 
		private $largeur; 
		private $hauteur; 
		private $id_personne; 
		private $id_type; 
	   
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
				$sql = 'SELECT * FROM meuble WHERE id_meuble = "'.$this->id.'"'; 
				if ($result = $db->fetch($sql))
				{ 
					$this->libelle= $result[0]['libelle'];
					$this->longueur= $result[0]['longueur'];
					$this->largeur= $result[0]['largeur'];
					$this->hauteur= $result[0]['hauteur'];
					$this->id_personne= $result[0]['id_personne'];
					$this->id_type= $result[0]['id_type'];
					return true; 
				} 
				return false; 
			} 
		} 
		
		public static function existe($libelle)
		{
			$db = Database::getInstance();
			$sql = 'SELECT * FROM meuble WHERE libelle="'.$libelle.'"'; 
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
			$sql = 'SELECT * FROM meuble'; 
			if ($result = $db->fetch($sql))
			{ 
				return $result; 
			} 
			return false; 
		}
		
		public function __toString()
		{ 
			return $this->libelle.' ('.$this->longueur.'x'.$this->largeur.'x'.$this->hauteur.')'; 
		} 
		
		// GET
		public function getLibelle()
		{
			return $this->libelle;
		}
		
		public function getLongueur()
		{
			return $this->longueur;
		}
		
		public function getLargeur()
		{
			return $this->largeur;
		}
		
		public function getHauteur()
		{
			return $this->hauteur;
		}
		
		public function getPersonne()
		{
			$personne = new Personne($this->id_personne);
			return $personne;
		}
		
		public function getTypeMeuble()
		{
			$typeMeuble = new TypeMeuble($this->id_type);
			return $typeMeuble;
		}
		
		// AJOUT
		public static function ajouter($libelle, $longueur, $largeur, $hauteur, $id_personne, $id_type)
		{
			$db = Database::getInstance();
			$sql = 'INSERT INTO projet_bachelor.meuble (libelle, longueur, largeur, hauteur, id_personne, id_type) VALUES ("'.$libelle.'",'.$longueur.','.$largeur.','.$hauteur.','.$id_personne.','.$id_type.');';
			$db->exec($sql);
		}
		
		// SET
		public function setLibelle($libelle)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE meuble SET libelle = "'.$libelle.'" WHERE id_meuble = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setLongueur($longueur)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE meuble SET longueur = "'.$longueur.'" WHERE id_meuble = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setLargeur($largeur)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE meuble SET largeur = "'.$largeur.'" WHERE id_meuble = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setHauteur($hauteur)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE meuble SET hauteur = "'.$hauteur.'" WHERE id_meuble = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setPersonne($id_personne)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE meuble SET id_personne = "'.$id_personne.'" WHERE id_meuble = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setTypeMeuble($id_type)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE meuble SET id_type = "'.$id_type.'" WHERE id_meuble = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
	} 
?>