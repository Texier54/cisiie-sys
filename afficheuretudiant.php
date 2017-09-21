<?php

	class afficheuretudiant extends afficheurpersonne
	{
		function vueCourte()
		{
			return $this->personne->nom.' '.$this->personne->prenom.' '.$this->personne->num_etudiant;
		}

		function vueDetail()
		{
			return $this->personne->nom.' '.$this->personne->prenom.' '.$this->personne->num_etudiant.' '.$this->personne->ref_formation;
		}
	}
