<?php

require_once('personne.php');
require_once('afficheurpersonne.php');
require_once('etudiant.php');
require_once('afficheuretudiant.php');
require_once('enseignant.php');
require_once('afficheurenseignant.php');

$perso1 = new etudiant('Lalouche');
$perso1 -> prenom="Jean";
$perso1 -> age="35";
$perso1 -> adresse="23 rue truc";
$perso1 -> ville="nancy";

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

$afficheur1 = new afficheuretudiant($perso1);

echo $afficheur1->vueCourte();

echo $afficheur1->Afficher('long');

