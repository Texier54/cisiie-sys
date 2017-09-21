<?php

require "personne.php";
require_once 'PHPUnit/Autoload.php';

class Personne1Test extends PHPUnit_Framework_TestCase {
    

    function testVisibility(){
        $prop = [ 'nom', 'prenom', 'age', 'adresse',
        'ville', 'codepostal', 'mail', 'mobile', 'idskype' ];
        
        foreach ( $prop as $p ){
            $rp = new ReflectionProperty('Personne', $p);
            $this->assertTrue($rp->isProtected(),
            'L\'attribut '.$p.' doit Ãªtre protÃ©gÃ©');
        }
    }
    
    function testMagic(){
        $this->assertTrue(method_exists('Personne', '__set'), 
        "La classe Personne n'a pas de mÃ©thode __set");

        $this->assertTrue(method_exists('Personne', '__get'), 
        "La classe Etudiant n'a pas de mÃ©thode __get");
    }
    
}
    
    
