<?php
	include('..\..\..\GestionVoiture\Modele\Respostry\transactionVoiture.php');
	class controllerVoiture
	{
		public $tabVoiture;
		public $nombre;
		public function controllerVoiture(){}
		
		public function addVoiture($numero,$type,$marque,$idPers)
		{
			$voitures=new transactionVoiture();
			$voitures->setNumero($numero)->setType($type)->setMarque($marque)->setIdPers($idPers)->insertion();
		}
		/*
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
		*/
		public function selectVoiture($idPers)
		{
			
			$this->tabVoiture=array();
			$voiture=new transactionVoiture();
			$this->tabVoiture=$voiture->afficherParPersonne($idPers);
			$nombre=$voiture->count($idPers); 
			$this->nombre=$nombre;
		}
	}
?>