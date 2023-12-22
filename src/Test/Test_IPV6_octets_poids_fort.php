<?php


use PHPUnit\Framework\TestCase;
require ("../actions/actionModule_IPV6.php");

class Test_IPV6_octets_poids_fort extends TestCase
{
    public function Test_IPV6_octets_poids_fort(){
        // Définition des adresses IPv6 pour le test
        $ipv6_1 = simplifyV2('2001:0db8:85a3:0000:0000:8a2e:0370:7334');
        $ipv6_2 = simplifyV2('0db8:2001:85a3:0000:0000:8a2e:0370:7334');
        $ipv6_3 = simplifyV2('0000:0000:0000:0000:0000:0000:0000:0000');

        $resultat_1 = binaire_poids_fort($ipv6_1);
        $resultat_2 = binaire_poids_fort($ipv6_2);
        $resultat_3 = binaire_poids_fort($ipv6_3);

        // Résultats
        $this->assertEquals("0010000000000001", $resultat_1['binaire']);
        $this->assertEquals("2001", $resultat_1['hexa']);
        $this->assertEquals("0000110110111000", $resultat_2['binaire']);
        $this->assertEquals("0DB8", $resultat_2['hexa']);
        $this->assertEquals("0000000000000000", $resultat_3['binaire']);
        $this->assertEquals("0000", $resultat_3['hexa']);
    }
}
