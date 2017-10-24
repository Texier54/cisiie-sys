<?php

require_once "src/peopleapp/personne/Personne.php";
require_once "src/peopleapp/personne/Groupe.php";
require_once "src/peopleapp/personne/Etudiant.php";

class GroupeTest extends \PHPUnit_Framework_TestCase {

    function testProperties(){
        $attr = ['groupe', 'semestre', 'formation', 'liste'] ; 
    
        foreach( $attr as $a){
            $this->assertClassHasAttribute($a, 'peopleapp\personne\Groupe',
            'La classe Groupe doit avoir un attribut '.$a);
        }
    }

    function testMethodsExist(){
        $mth = [ 'ajouterEtudiant' , 'calculerMoyenneGroupeMat',
        'calculerMoyenneGroupe' ];
        
        foreach ( $mth as $m ){
            $this->assertTrue(method_exists('peopleapp\personne\Groupe', $m), 
            "La classe Groupe doit avoir une mÃ©thodes $m");
        }
    }
    
    function testAjouterEtudiant() {
        $p1 = new \peopleapp\personne\Etudiant('Jagger');
        $g = new \peopleapp\personne\Groupe('G1', 'S1', 'Cisiie');

        $g->ajouterEtudiant($p1);

        $this->assertTrue(gettype($g->liste) == 'array',
            'L\'attibut liste de la classe Groupe doit etre un tableau');

        $this->assertContains($p1, $g->liste,
        'Il y a un probleme avec l\'ajout des objets Etudiant dans le tableau');
    }

    function testcalCalculerMoyenneGroupeMat(){
        $p1 = new \peopleapp\personne\Etudiant('Jagger');
        $p2 = new \peopleapp\personne\Etudiant('Richards');
        $p3 = new \peopleapp\personne\Etudiant('Watts');
        $p4 = new \peopleapp\personne\Etudiant('Wood');
        $p5 = new \peopleapp\personne\Etudiant('Taylor');

        $p1->ajouterNote('math',10);
        $p1->ajouterNote('math',12);
        $p1->ajouterNote('math',14);
        $p1->ajouterNotes('info', '10;14.5;8;16');
        
        $p2->ajouterNotes('info', '11.5;12.5;5;5');
        $p2->ajouterNotes('math', '2;4.5;3;10');
        
        $p3->ajouterNotes('info', '4;7;12;12;8');
        $p3->ajouterNotes('math', '12;14;12;11');
        
        $p4->ajouterNotes('info', '10;17;12.5;13');
        $p4->ajouterNotes('math', '14;18;11;14.5');
        
        $p5->ajouterNotes('info', '1;3;4.5;1');
        $p5->ajouterNotes('math', '0;0;1;2');
        
        $g = new \peopleapp\personne\Groupe('G1', 'S1', 'Cisiie');

        $g->ajouterEtudiant($p1);
        $g->ajouterEtudiant($p1);
        $g->ajouterEtudiant($p2);
        $g->ajouterEtudiant($p3);
        $g->ajouterEtudiant($p4);
        $g->ajouterEtudiant($p5);

        
        $res = $g->calculerMoyenneGroupe('noms');
        $this->assertTrue(gettype($res)=='array',
        'calculerMoyenneGroupe doit retourner un tableau');

        $this->assertCount(5, $res,
        'Le tableau retournÃ© par calculerMoyenneGroupe doit contenir une entrÃ©e pour chaque etudiant');


        $vrai = [
            'Jagger' => 12.07,
            'Richards' => 6.69,
            'Taylor' => 1.57,
            'Watts' => 10.43,
            'Wood' => 13.76];
        
        $this->assertEquals($vrai, $res,
        'Il ya un souscis avec le calcul de la moyenne groupe ou le tri par nom.');
         $vrai = [ 
             'Wood' => 13.76, 
             'Jagger' => 12.07,
             'Watts' => 10.43,
             'Richards' => 6.69,
             'Taylor' => 1.57
         ];

         $res = $g->calculerMoyenneGroupe('notes');
         $this->assertEquals($vrai, $res,
        'Il ya un souscis avec le calcul de la moyenne groupe ou le tri par notes.');
        

        
        
         
    }
        


    



}
