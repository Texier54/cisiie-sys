<?php

class Personne
{
  public $nom;
  public $prenom;
  public $age;
  public $adresse;
  public $ville;
  public $conjoint="";

  public function __construct($nom)
  {
    $this->nom = $nom;
  }
        
  public function __toString()
  {
    $arr = array('Nom' => $this->nom, 'Prenom' => $this->prenom, 'Age' => $this->age, 'Adresse' => $this->adresse, 'Ville' => $this->ville);

    return json_encode($arr)."<br>";
  }

  public function ajouterConjoint($personne)
  {
    $this->conjoint = $personne;
  }
  
  public function compter()
  {
    $compter='';
    for($i=0;$i<=$this->age;$i++)
	$compter = $compter." ".$i;
    return $compter;
  }

  public function ecrirePunition($phrase, $repet)
  {
    $text="";
    for($i=0;$i<$repet;$i++)
	$text = $text."<br>".$phrase;
    return $text;
  }
}
    

