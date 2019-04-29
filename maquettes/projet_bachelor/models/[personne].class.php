<?php
	class Personne
	{ 
		private $id; 
		private $nom; 
		private $prenom; 
		private $telephone;
		private $email;
		private $id_role;
	   
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
				$sql = 'SELECT * FROM personne WHERE id_personne = "'.$this->id.'"'; 
				if ($result = $db->fetch($sql))
				{ 
					$this->nom= $result[0]['nom'];
					$this->prenom= $result[0]['prenom'];
					$this->telephone= $result[0]['telephone'];
					$this->email= $result[0]['mail'];
					$this->id_role= $result[0]['id_role'];
					return true; 
				} 
				return false; 
			} 
		} 
		
		public static function existe($prenom, $nom)
		{
			$db = Database::getInstance();
			$sql = 'SELECT * FROM personne WHERE prenom="'.$prenom .'" AND nom="'.$nom.'"'; 
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
			$sql = 'SELECT * FROM personne'; 
			if ($result = $db->fetch($sql))
			{ 
				return $result; 
			} 
			return false; 
		}
		
		public function __toString()
		{ 
			return $this->prenom.' '.$this->nom; 
		} 
		
		// GET
		public function getNom()
		{
			return $this->nom;
		}
		
		public function getPrenom()
		{
			return $this->prenom;
		}
		
		public function getTelephone()
		{
			return $this->telephone;
		}
		
		public function getMail()
		{
			return $this->email;
		}
		
		public function getRole()
		{
			$role = new Role($this->id_role);
			return $role;
		}
		
		// AJOUTER
		public static function ajouter($nom, $prenom, $telephone, $email, $id_role)
		{
			$db = Database::getInstance();
			$sql = 'INSERT INTO projet_bachelor.personne (nom, prenom, telephone, mail, id_role) VALUES ("'.$nom.'","'.$prenom.'",'.$telephone.'","'.$email.'",'.$id_role.');';
			$db->exec($sql);
		}
		
		// SET
		public function setNom($nom)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE personne SET nom = "'.$nom.'" WHERE id_personne = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setPrenom($prenom)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE personne SET prenom = "'.$prenom.'" WHERE id_personne = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setTelephone($telephone)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE personne SET telephone = "'.$telephone.'" WHERE id_personne = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setMail($email)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE personne SET mail = "'.$email.'" WHERE id_personne = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
		
		public function setRole($id_role)
		{
			$db = Database::getInstance();
			$sql = 'UPDATE personne SET id_role = "'.$id_role.'" WHERE id_personne = ' .$this->id;
			$db->exec($sql);
			$this->load();
		}
	} 
?>