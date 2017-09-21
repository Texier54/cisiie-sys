<?php
require "afficheurpersonne.php";
	class afficheurenseignant extends afficheurpersonne
	{
		function vueCourte()
		{
			return $this->personne->nom.' '.$this->personne->prenom.' '.$this->personne->conjoint;
		}

		function vueDetail()
		{
			return $this->personne->nom.' '.$this->personne->prenom.' '.$this->personne->composante.' '.$this->bureau;
		}
	}
