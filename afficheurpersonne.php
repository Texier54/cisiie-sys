<?php

class AfficheurPersonne
{
  
  public $personne;

  public function __construct($personne)
  {
    $this->personne = $personne;
  }

  public function vueCourte()
  {
    return "<div>Nom : ".$this->personne->nom."<br>Prenom : ".$this->personne->prenom."<br>Ville : ".$this->personne->ville."</div>";
  }

  public function vueDetail()
  {
    return "<div>Nom : ".$this->personne->nom."<br>Prenom : ".$this->personne->prenom."<br>Ville : ".$this->personne->ville."<br>Adresse : ".$this->personne->adresse."<br>Ville : ".$this->personne->ville."</div>";
  }

  public function afficher($sel)
  {
	if($sel == "court")
		$this->vueCourte();
	elseif($sel == "long")
		$this->vueDetail();
	else
		echo "erreur";
  }

}
