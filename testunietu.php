<?php

require "personne.php";
require "enseignant.php";


class EnseignantTest extends PHPUnit_Framework_TestCase {

    function testSubclass(){
        $this->assertTrue(is_subclass_of('Enseignant', 'Personne'), 
        "La classe Enseignant doit hÃ©riter pas de Personne");
    }
        
    function testProperties(){
        $this->assertClassHasAttribute( 'discipline', 'Enseignant');
        $this->assertClassHasAttribute( 'composante', 'Enseignant');
        $this->assertClassHasAttribute( 'bureau'    , 'Enseignant');
    }

    function testVisibility(){
        $prop = [ 'discipline' ,  'composante', 'bureau', 'conjoint' ];
        
        foreach ( $prop as $p ){
            $rp = new ReflectionProperty('Enseignant', $p);
            $this->assertTrue($rp->isProtected(),
            'L\'attribut '.$p.' doit Ãªtre protÃ©gÃ©');
        }
    }
   
    function testMagic(){
        $this->assertTrue(method_exists('Enseignant', '__set'), 
        "La classe Enseignant n'a pas de mÃ©thode __set");

        $this->assertTrue(method_exists('Enseignant', '__get'), 
        "La classe Enseignant n'a pas de mÃ©thode __get");
    }

    function testAjoutyerConjointExists(){
        $this->assertTrue(method_exists('Enseignant', 'ajouterConjoint'), 
        "La classe Enseignant doit avoir une de mÃ©thode ajouterConjoint");
    }
    
    private function createEnseignant(){
        $p = new Enseignant('Jagger');
        $p->prenom='Mick';
        $p->age=23;
        $p->adresse='5 ave of the Rock';
        $p->ville='Dartford';
        $p->codepostal=90210;
        $p->mail='mick.jagger@rolingstones.com';
        $p->mobile='+41 6 12 34 56 78';
        $p->idskype='jagsir';
        
        $p->discipline='Chant';
        $p->composante='IUT charlemagne';
        $p->bureau='A-230';

        return $p;
    }
 
  function testEnseignant(){
    $p1 = new Enseignant('Jagger');
    $this->assertEquals($p1->nom, 'Jagger');
  }
  
  function testPropertiesValues(){
    $p1 = $this->createEnseignant();
    
    $this->assertEquals($p1->prenom, 'Mick');
    $this->assertEquals($p1->age, 23);
    $this->assertEquals($p1->adresse, '5 ave of the Rock');
    $this->assertEquals($p1->ville, 'Dartford');
    $this->assertEquals($p1->codepostal, 90210);
    $this->assertEquals($p1->mail, 'mick.jagger@rolingstones.com');
    $this->assertEquals($p1->mobile, '+41 6 12 34 56 78');
    $this->assertEquals($p1->idskype, 'jagsir');
    
    $this->assertEquals($p1->discipline, 'Chant');
    $this->assertEquals($p1->composante, 'IUT charlemagne');
    $this->assertEquals($p1->bureau, 'A-230');
  }

  function testCompter(){
    $p = new Enseignant('toto');
    
    $this->assertThat($p->compter(5),
		      $this->logicalOr($this->equalTo('0 1 2 3 4 5')  ,
				       $this->equalTo('0 1 2 3 4 5 ') , 
				       $this->equalTo("0\n1\n2\n3\n4\n5\n") ,
				       $this->equalTo("0\n1\n2\n3\n4\n5"),
				       $this->equalTo('0 1 2 3 4 5\n')  ,
				       $this->equalTo('0 1 2 3 4 5 \n')  
				       ));
    
  }


}
