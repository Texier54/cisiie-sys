<?php

require_once("AbstractHttpRequest.php");
require_once("HttpRequest.php");

class HttpRequestTest extends PHPUnit_Framework_TestCase {
  
    private function makeFakeData(){
        // constructs a fake SERVER variable.
        // URL = http://localhost/tweeter/test.php/stuff/morestuff/?id=15
        $_SERVER = array(
            'SCRIPT_NAME' => '/tweeter/test.php',
            'REQUEST_METHOD' => 'GET',
            'PATH_INFO' => '/stuff/morestuff/');
        $_GET  = array ( 'id' => '15' );
        $_POST = array ( 'text' => 'Un texte.' );
        
    }

    function testSubclass(){
        $this->assertTrue(is_subclass_of('HttpRequest', 'AbstractHttpRequest'),
        "La class HttpRequest doit concrÃ©tiser AbstractHttpRequest");
    }

    function testHttpRequest(){
        $this->makeFakeData();
        $http_req = new HttpRequest();

        $this->assertEquals($http_req->script_name, $_SERVER['SCRIPT_NAME'],
        "L'attribut script_name n'est pas correctement valuÃ©");

        $this->assertEquals($http_req->method, $_SERVER['REQUEST_METHOD'],
        "L'attribut method n'est pas correctement valuÃ©");

        $this->assertEquals($http_req->path_info, $_SERVER['PATH_INFO'],
        "L'attribut path_info n'est pas correctement valuÃ©");
        
        $this->assertEquals($http_req->root, dirname($_SERVER['SCRIPT_NAME']),
        "L'attribut root n'est pas correctement valuÃ©");

        $this->assertTrue($http_req->get === $_GET,
        "L'attribut get n'est pas correctement valuÃ©");

        $this->assertTrue($http_req->post === $_POST,
        "L'attribut get n'est pas correctement valuÃ©");
    }
}
    
