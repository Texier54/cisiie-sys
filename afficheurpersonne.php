<?php

abstract class AfficheurPersonne
{
  
  public $personne;

  public function __construct($personne)
  {
    $this->personne = $personne;
  }

  abstract public function vueCourte();

  abstract public function vueDetail();

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
