<?php
	class TypeVente
	{ 
		private $id; 
		private $libelle;
	   
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
				$sql = 'SELECT * FROM type_vente WHERE id_type_vente = "'.$this->id.'"'; 
				if ($result = $db->fetch($sql))
				{ 
					$this->libelle= $result[0]['libelle'];
					return true; 
				} 
				return false; 
			} 
		} 
		
		public static function existe($libelle)
		{
			$db = Database::getInstance();
			$sql = 'SELECT * FROM type_vente WHERE libelle="'.$libelle.'";'; 
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
			$sql = 'SELECT * FROM type_vente'; 
			if ($result = $db->fetch($sql))
			{ 
				return $result; 
			} 
			return false; 
		}
		
		public function __toString()
		{ 
			return $this->libelle; 
		} 
		
		// GET
		public function getLibelle()
		{
			return $this->libelle;
		}
		
		// AJOUTER
		public static function ajouter($libelle)
		{
			$db = Database::getInstance();
			$sql = 'INSERT INTO projet_bachelor.type_vente (libelle) VALUES ("'.$libelle.'");';
			$db->exec($sql);
		}
		
		// SET
		public function setLibelle($libelle)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE type_vente SET libelle = "'.$libelle.'" WHERE id_type_vente = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
	} 
?>