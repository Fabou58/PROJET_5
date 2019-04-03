<?php
	class Adresse
	{ 
		private $id; 
		private $numRue; 
		private $nomRue; 
		private $codePostal;
		private $ville;
	   
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
				$sql = 'SELECT * FROM adresse WHERE id_adresse = "'.$this->id.'"'; 
				if ($result = $db->fetch($sql))
				{ 
					$this->numRue= $result[0]['num_rue'];
					$this->nomRue= $result[0]['nom_rue'];
					$this->codePostal= $result[0]['code_postal'];
					$this->ville= $result[0]['ville'];
					return true; 
				} 
				return false; 
			} 
		} 
		
		public static function existe($numRue, $nomRue, $codePostal)
		{
			$db = Database::getInstance();
			$sql = 'SELECT * FROM adresse WHERE num_rue='.$numRue .' AND nom_rue="'.$nomRue.'" AND code_postal='.$codePostal; 
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
			$sql = 'SELECT * FROM adresse'; 
			if ($result = $db->fetch($sql))
			{ 
				return $result; 
			} 
			return false; 
		}
		
		public function __toString()
		{ 
			return $this->numRue .' '.$this->nomRue .' '.$this->ville; 
		} 
		
		// GET
		public function getNumRue()
		{
			return $this->numRue;
		}
		
		public function getNomRue()
		{
			return $this->nomRue;
		}
		
		public function getCodePostal()
		{
			return $this->codePostal;
		}
		
		public function getVille()
		{
			return $this->ville;
		}
		
		// AJOUTER
		public static function ajouter($numRue, $nomRue, $codePostal, $ville)
		{
			$db = Database::getInstance();
			$sql = 'INSERT INTO projet_bachelor.adresse (num_rue, nom_rue, code_postal, ville) VALUES ("'.$numRue.'",'.$nomRue.',"'.$codePostal.'",'.$ville.');';
			$db->exec($sql);
		}
		
		// SET
		public function setNumRue($numRue)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE adresse SET num_rue = "'.$numRue.'" WHERE id_adresse = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setNomRue($numRue)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE adresse SET nom_rue = "'.$nomRue.'" WHERE id_adresse = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setCodePostal($codePostal)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE adresse SET code_postal = "'.$codePostal.'" WHERE id_adresse = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setVille($ville)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE adresse SET ville = "'.$ville.'" WHERE id_adresse = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
	} 
?>