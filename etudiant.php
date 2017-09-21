<?php

	class etudiant extends personne
	{
		protected $num_etudiant="zqqz";
		protected $ref_formation="zqqzd";
		protected $groupe;

		public function ecrirePunition($phrase, $repet)
		{
			$text="";
			for($i=0;$i<$repet;$i++)
				$text = $text."<br>".$phrase;
		  	return $text;
		}
	}
