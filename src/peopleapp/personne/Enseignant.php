<?php
	namespace peopleapp\personne;

	class Enseignant extends Personne
	{
		public $discipline="zdzdzd";
		public $composante="qzdqzd";
		public $bureau="qzdqzd";
		public $conjoint="zqdz";
		
		public function ajouterConjoint($personne)
		{
			$this->conjoint = $personne;
		}
	}
