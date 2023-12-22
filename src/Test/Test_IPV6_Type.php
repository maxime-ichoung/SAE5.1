<?php


use PHPUnit\Framework\TestCase;
require ("../actions/actionModule_IPV6.php");

class Test_IPV6_Type extends TestCase
{
    public function test_type_ipv6() {
        // Définition des adresses IPv6 pour le test
        $ipv6_1 = simplifyV2('2001:0db8:85a3:0000:0000:8a2e:0370:7334');
        $ipv6_2 = simplifyV2('0000:0000:0000:0000:0000:0000:0000:0000');
        $ipv6_3 = simplifyV2('fe80:0db8:85a3:0000:0000:8a2e:0370:7334');
        $ipv6_4 = simplifyV2('ff00:0db8:85a3:0000:0000:8a2e:0370:7334');
        $ipv6_5 = simplifyV2('0000:0000:0000:0000:0000:0000:0000:0001');

        $resultat_1 = type_ipv6($ipv6_1);
        $resultat_2 = type_ipv6($ipv6_2);
        $resultat_3 = type_ipv6($ipv6_3);
        $resultat_4 = type_ipv6($ipv6_4);
        $resultat_5 = type_ipv6($ipv6_5);

        // Résultats
        $this->assertEquals("Unicast", $resultat_1);
        $this->assertEquals("Adresse non spécifiée", $resultat_2);
        $this->assertEquals("Adresse locale du lien", $resultat_3);
        $this->assertEquals("Multicast", $resultat_4);
        $this->assertEquals("Adresse de bouclage", $resultat_5);
    }
}
