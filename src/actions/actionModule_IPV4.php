<?php
# Algorithme de calcul de la taille et du masque alloué à chaque sous réseaux
function taille_mask_sous_res($taille_sous_res){
    /**
     * Fonction qui calcule la taille et le masque allouée d'un sous réseaux en fonction de la taille souhaitée. La taille alloue
     * correspond à (puissance de 2) - 2 > à taille souhaitée. Le masque est calculée comme suit : mask = n, avec
     * n correspondant à  (2**(32-n)) - 2 = taille allouée, n compris entre 8 et 30.
     *
     * Exemple : pour une taille souhaitée de 7, la taille allouée sera 14 car 14 = 16 - 2 = (2**4) - 2, (2**3) ne
     * conviendrai pas car (2**3) - 2 = 8 - 2 = 6 or 6 < 7. Le masque sera 28 car 32 - 28 = 4 or taille allouée est égale
     * à (2**4) - 2
     *
     * Entrée : un integer, la taille souhaitée
     *
     * Sortie : un tableau de taille 2, contenant la taille allouée en indice 0 et le masque en indice 1.
     */
    for ($j = 30; $j > 8; $j--) {
        $taille_alloue = (2 ** (32 - $j)) - 2;
        if ($taille_sous_res <= $taille_alloue) {
            $mask_sous_res = $j;
            break;
        }
    }
    return [$taille_alloue,$mask_sous_res];
}


# Algorithme de conversion masque CIDR vers masque décimaux
function mask_cdri_vers_dec($mask_actuel){
    /**
     * Fonction qui convertie un masque au format CIDR vers un masque au format IP (décimal).
     *
     * Exemple : le masque 24 sera convertie en 255.255.255.0 .
     *
     * Entrée : un integer compris entre 1 et 32, le masque au format CIDR.
     *
     * Sortie : une chaîne de caractères, le masque au format IP.
     */
    $mask_dec = '';
    $packet_bits = 1;
    while ($mask_actuel >= 8) {
        $mask_dec = $mask_dec . '255';
        if ($packet_bits <= 3) {
            $mask_dec = $mask_dec . '.';
        }
        $mask_actuel = $mask_actuel - 8;
        $packet_bits++;
    }
    while ($packet_bits <= 4) {
        if ($mask_actuel != 0) {
            $der_part_non_null = 255 - (2 ** (8 - $mask_actuel)) + 1;
            $mask_dec = $mask_dec . $der_part_non_null;
            $mask_actuel = 0;
        } else {
            $mask_dec = $mask_dec . '0';
        }
        if ($packet_bits <= 3) {
            $mask_dec = $mask_dec . '.';
        }
        $packet_bits++;
    }
    return $mask_dec;
}

#Calcul du broadcast et de la plage d'adresse de chaque sous réseaux
function addr_broad_plage_sous_res($addr,$taille_alloue){
    /**
     * Fonction qui, donné l'adresse IP d'un réseau/sous réseau et la taille qui lui est allouée, calcule la plage d'adresses
     * IP qui lui est allouée ainsi que son adresse de broadcast.
     *
     * Exemple : un réseau d'adresse 128.0.0.0 et de taille allouée 62 se vera attribué la plage d'adresses IP :
     * 128.0.0.1 - 128.0.0.62 et l'adresse de broadcast : 128.0.0.63
     *
     * Entrée : un long, l'adresse IP du réseau sous forme de long integer | un integer, la taille allouée au réseau
     *
     * Sortie : un tableau de taille 3 avec l'adresse IP du réseau sous form de long en indice 0, la plage d'adresses IP
     * attribuée sous forme de chaîne de caractère en indice 1 et l'adresse de broadcast sous forme de long en indice 2.
     */
    $premierPlage = $addr + 1;
    $dernierPlage = $premierPlage + ($taille_alloue - 1);
    $Plage = long2ip($premierPlage) . ' - ' . long2ip($dernierPlage);
    $broadcast = $dernierPlage + 1;

    return [$addr,$Plage,$broadcast];
}