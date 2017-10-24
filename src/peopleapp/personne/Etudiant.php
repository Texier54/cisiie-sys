<?php
	namespace peopleapp\personne;

	class etudiant extends Personne
	{
		protected $num_etudiant="zqqz";
		protected $ref_formation="zqqzd";
		protected $groupe;
		protected $mat;

		public function ecrirePunition($phrase, $repet)
		{
			$text="";
			for($i=0;$i<$repet;$i++)
				$text = $text."<br>".$phrase;
		  	return $text;
		}

		public function ajouterNote($matiere, $note)
		{
			$this->mat[$matiere][]=$note;
		}

		public function calculerMoyenneMat($matiere)
		{
			if(!isset($this->mat[$matiere]))
				throw new \Exception('L\'étudiant '.$this->nom.' n\'a pas de notes dans cette matière<br>');
			else
			{
				$moyenne=0;
				foreach($this->mat[$matiere] as $value)
				{
					$moyenne = $moyenne+$value;
				}
				return $moyenne/count($this->mat[$matiere]);
			}
		}
		
		public function ajouterNotes($matiere, $note)
		{
			if(!isset($this->mat[$matiere]))
				$this->mat[$matiere] = [];
			$notes = explode(";", $note);
			$this->mat[$matiere] = array_merge($this->mat[$matiere], $notes);
		}

		public function calculerMoyenneGenerale()
		{
			$nombre=0;
			$total=0;
			$general=[];
			foreach($this->mat as $key => $value )
			{
				$total = $total + $general[$key] = $this->calculerMoyenneMat($key);
				$nombre=$nombre+1;
				
			}
			$general['general'] = $total/$nombre;
			return $general; 
		}
	}
