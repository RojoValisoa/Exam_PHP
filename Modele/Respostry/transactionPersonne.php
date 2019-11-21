<?php
	include('..\..\..\GestionVoiture\Modele\Entity\personne.php');
	include('..\..\..\GestionVoiture\Modele\Respostry\Connexion\connexion.php');
	class transactionPersonne extends personne
	{
		public $idTab;
		public function transactionPersonne(){}
				
		public function insertion()
		{
			$con=new connexion();
			$nom=$this->getNom();
			$prenom=$this->getPrenom();
			$adresse=$this->getAdresse();
			$req="insert into personne(nom,prenom,adresse) values('$nom','$prenom','$adresse')";
			$count=$con->pdoo->exec($req);
			return $this;	
		}
		public function supprimer()
		{
		  $req="delete from personne where id=".$this->getId();
		  $con=new connexion();	
		  $count=$con->pdoo->exec($req);
		}
		public function modifier()
		{
			$nom;
			$prenom;
			$adresse;
			$con=new connexion();
			$req="select * from personne where id=".$this->getId();
			$liste=$con->pdoo->query($req);
			while($p=$liste->fetch())
			{
				$nom=$p['nom'];
				$prenom=$p['prenom'];
				$adresse=$p['adresse'];				
			}
			if($this->getNom()=="")
			{
				$this->setNom($nom);
			}
			if($this->getPrenom()=="")
			{
				$this->setPrenom($prenom);
			}
			if($this->getAdresse()=="")
			{
				$this->setAdresse($adresse);
			}
			$req="update personne set nom='".$this->getNom()."',prenom='".$this->getPrenom()."',adresse='".$this->getAdresse()."' where id=".$this->getId();
			$con1=new connexion();
			$count=$con->pdoo->exec($req);
		}
		public function afficher($id)
		{
			$con=new connexion();
			$req="select * from personne where id=".$id;
			$liste=$con->pdoo->query($req);
			$i=0;
			while($p=$liste->fetch())
			{
				$this->setId($p['id']);
				$this->setNom($p['nom']);
				$this->setPrenom($p['prenom']);
				$this->setAdresse($p['adresse']);	
			}			
		}
		public function count()
		{
			$con=new connexion();
			$req="select * from personne";
			$liste=$con->pdoo->query($req);
			$nombre=0;
			while($p=$liste->fetch())
			{
				$nombre=$nombre+1;
			}
			return $nombre;
			
		}
		function selectId()
		{
			$this->idTab=array();
			$con=new connexion();
			$req="select id from personne";
			$liste=$con->pdoo->query($req);
			$i=1;
			while($p=$liste->fetch())
			{
				$this->idTab[$i]=$p['id'];
				$i++;
			}			
		}
	
	}
?>
