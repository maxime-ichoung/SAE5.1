<?php
require '../actions/actionModule_ping.php';
use PHPUnit\Framework\TestCase;


class NomDomaineValidatorTest extends TestCase {
    public function testValidDomainNames() {
        $this->assertEquals(1, validateNomDomaine("exemple.com"));
        $this->assertEquals(1, validateNomDomaine("sous-domaine.exemple.fr"));
        $this->assertEquals(1, validateNomDomaine("test123.net"));
        $this->assertEquals(1, validateNomDomaine("domaine-avec-tiret.com"));
    }

    public function testInvalidDomainNames() {
        $this->assertEquals(0, validateNomDomaine("-exemple.com"));
        $this->assertEquals(0, validateNomDomaine("exemple..com"));
        $this->assertEquals(0, validateNomDomaine("ex_ample.com"));
        $this->assertEquals(0, validateNomDomaine("exemple"));
        $this->assertEquals(0, validateNomDomaine("domaine_avec_underscore.com"));
    }
}

