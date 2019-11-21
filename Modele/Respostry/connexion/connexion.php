<?php
	include('..\..\..\GestionVoiture\Configuration\config.php');
	class connexion extends config
	{
		public $base;
		public $pdoo;
		public function connexion()
		{	
			try
			{
				$this->pdoo=new PDO("mysql:host=$this->hostname;dbname=$this->bd",$this->username,$this->password);
			}
			catch(PDOException $e){ echo "ERREUR";}

		}
		
	}
?>