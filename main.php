<?php

require_once("src/peopleapp/utils/ClassLoader.php");
$loader = new peopleapp\utils\ClassLoader('src');
$loader->register();

use \peopleapp\personne\Etudiant as Etu;
use \peopleapp\afficheur as aff;
use \peopleapp\personne\Enseignant as enseignant;

$perso1 = new Etu('Lalouche');
$perso1 -> prenom="Jean";
$perso1 -> age="35";
$perso1 -> adresse="23 rue truc";
$perso1 -> ville="nancy";
$perso1 -> ajouterNote('math', 16.5);
$perso1 -> ajouterNote('math', 12.5);
$perso1 -> ajouterNote('math', 14.5);
$perso1 -> ajouterNote('info', 10.5);
$perso1 -> ajouterNotes('info', '15.5;12;18');
$perso1 -> ajouterNotes('math', '15.5;12;18');

$perso3 = new Etu('Lalouche2');
$perso3 -> prenom="Jqzf";
$perso3 -> ajouterNotes('math', '5.5;12;18');

try
{
	echo $perso1 -> calculerMoyenneMat('math')."<br>";
} catch(Exception $e)
{
	 echo $e->getMessage();
}

$tab=$perso1->calculerMoyenneGenerale();
echo "<table><tr><th>Matiere</th><th>Note</th></tr>";
foreach($tab as $mat => $note){
	echo "<tr><td>".$mat."</td><td>".$note."</td></tr>";
}
echo "</table><br>";	


echo $perso1 -> nom;

$perso1->__toString();

$perso2 = new enseignant('tuche');
$perso2 -> prenom="Pierre";
$perso2 -> age="28";
$perso2 -> adresse="21 rue truc";
$perso2 -> ville="nancy";

echo $perso2 -> nom;

echo $perso2->__toString();

$perso2->ajouterConjoint($perso1);
echo $perso2->conjoint->__toString();

echo $perso1->compter();

echo $perso1->ecrirePunition('Phrase de punition', 4);

$afficheur1 = new aff\AfficheurEtudiant($perso1);

echo $afficheur1->vueCourte();

echo $afficheur1->Afficher('long')."<br><br>";

$grp = new peopleapp\personne\Groupe('Groupe 1', 'S 1', 'Cisiie');

$grp->ajouterEtudiant($perso1);

$grp->ajouterEtudiant($perso3);

echo $grp->calculerMoyenneGroupeMat('math').'<br>';

print_r($grp->calculerMoyenneGroupe('notes'));

