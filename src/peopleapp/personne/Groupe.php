<?php

	namespace peopleapp\personne;

	class Groupe extends Etudiant
	{
		protected $groupe;
		protected $semestre;
		protected $formation;
		protected $liste;

		public function __construct($groupe, $semestre, $formation)
		{
			$this->groupe= $groupe;
			$this->semestre= $semestre;
			$this->formation= $formation;
		}
		
		public function ajouterEtudiant($etudiant)
		{
			$this->liste[]= $etudiant;
		}

		public function calculerMoyenneGroupeMat($matiere)
		{
			$nombre = count($this->liste);
			$total=0;
			$count =0;
			for($i=0;$i<$nombre;$i++)
			{
				$total = $total + $this->liste[$i]->calculerMoyenneMat($matiere);
				if($this->liste[$i]->calculerMoyenneMat($matiere) != 0)
					$count = $count+1;
			}
			return $total/$count;
		}

		public function calculerMoyenneGroupe($tri)
		{
			$nombre = 2;
			for($i=0;$i<$nombre;$i++)
			{	
				$nom = $this->liste[$i]->nom;
				$total[$nom] = $this->liste[$i]->calculerMoyenneGenerale()['general'];
			}
			if($tri == 'noms')
				krsort($total);
			elseif($tri == 'notes')
				arsort($total);

			return $total;	
		}

	}
