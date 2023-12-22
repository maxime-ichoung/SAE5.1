<?php


use PHPUnit\Framework\TestCase;

class TestIPV4 extends TestCase
{
    public function testTailleMaskSousRes() {
        $taille_souhaite = 7; // Test avec une taille souhaitée
        $resultat_attendu = [14, 28]; // Taille allouée et masque attendus
    
        $resultat_obtenu = taille_mask_sous_res($taille_souhaite);
        $this->assertEquals($resultat_attendu, $resultat_obtenu, "Le test pour la fonction taille_mask_sous_res a échoué.");
    }
    

    public function testMaskCidrVersDec() {
        $mask_cidr = 24; // Test avec un masque CIDR
        $resultat_attendu = "255.255.255.0"; // Masque décimal attendu
    
        $resultat_obtenu = mask_cdri_vers_dec($mask_cidr);
        $this->assertEquals($resultat_attendu, $resultat_obtenu, "Le test pour la fonction mask_cdri_vers_dec a échoué.");
    }
    

    public function testAddrBroadPlageSousRes() {
        $addr = ip2long('128.0.0.0'); // Adresse IP de test
        $taille_alloue = 62; // Taille allouée de test
        $resultat_attendu = [ip2long('128.0.0.0'), '128.0.0.1 - 128.0.0.62', ip2long('128.0.0.63')]; // Résultats attendus
    
        $resultat_obtenu = addr_broad_plage_sous_res($addr, $taille_alloue);
        $this->assertEquals($resultat_attendu, $resultat_obtenu, "Le test pour la fonction addr_broad_plage_sous_res a échoué.");
    }
    
}