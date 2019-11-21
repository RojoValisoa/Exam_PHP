<?php
	include('..\..\..\GestionVoiture\Modele\Respostry\transactionPersonne.php');
	class controllerPersonne
	{
		public $tabPersonne;
		public $nombre;
		public function controllerPersonne(){}
		
		public function addPersonnes($nom,$prenom,$adresse)
		{
			$personnes=new transactionPersonne();
			$personnes->setNom($nom)->setPrenom($prenom)->setAdresse($adresse)->insertion();
			//$personnes->setPrenom($prenom);
			//$personnes->setAdresse($adresse);
			//$personnes->insertion();
		}
		public function deletePersonne($id)
		{
			$personnes=new transactionPersonne();
			$personnes->setId($id);
			$personnes->supprimer();
		}
		
		public function updatePersonne($id,$nom,$prenom,$adresse)
		{
			$personnes=new transactionPersonne();
			$personnes->setId($id);
			$personnes->setNom($nom);
			$personnes->setPrenom($prenom);
			$personnes->setAdresse($adresse);
			$personnes->modifier();
		}
		public function allPersonne()
		{
			$this->tabPersonne=array();
			$personnes=new transactionPersonne();
			$nombre=$personnes->count();
			$personnes->selectId();
			for ($i=1;$i<=$nombre;$i++)
			{
				$idPers=$personnes->idTab[$i];
				$personnes->afficher($idPers);
				$this->tabPersonne['id'][$i]=$personnes->getId();
				$this->tabPersonne['nom'][$i]=$personnes->getNom();
				$this->tabPersonne['prenom'][$i]=$personnes->getPrenom();
				$this->tabPersonne['adresse'][$i]=$personnes->getAdresse();
			}
			$this->nombre=$nombre;
		}
	}
?>