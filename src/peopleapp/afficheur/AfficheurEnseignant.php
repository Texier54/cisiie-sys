<?php
	namespace peopleapp\afficheur;

	class afficheurenseignant extends AfficheurPersonne
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
