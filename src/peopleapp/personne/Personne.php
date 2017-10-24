<?php

namespace peopleapp\personne;

abstract class personne
{
  protected $nom;
  protected $prenom;
  protected $age;
  protected $adresse;
  protected $ville;

  public function __construct($nom)
  {
    $this->nom = $nom;
  }
     
  public function __toString()
  {
    $arr = array('Nom' => $this->nom, 'Prenom' => $this->prenom, 'Age' => $this->age, 'Adresse' => $this->adresse, 'Ville' => $this->ville);

    return json_encode($arr)."<br>";
  }

  public function __set($name, $value)
  {
    if(property_exists($this, $name) != 1)
	throw new \Exception('L\'atribut n\'éxiste pas');

    $this->$name=$value;
  }

  public function __get($name)
  {
    return $this->$name;
  }
  
  public function compter()
  {
    $compter='';
    for($i=0;$i<=$this->age;$i++)
	$compter = $compter." ".$i;
    return $compter;
  }
}
    

