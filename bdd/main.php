<?php

	require_once('ConnectionFactory.php');

	ConnectionFactory::setConfig('config.ini');

	$bdd = ConnectionFactory::makeConnection();

	$etu = $bdd->query("SELECT * FROM etudiant ORDER BY id DESC");
	while ($donnees = $etu->fetch(PDO::FETCH_ASSOC))
	{
		echo $donnees['nom']."<br>";
	}

