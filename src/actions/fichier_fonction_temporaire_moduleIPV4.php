<?php
# Algorithme de calcul de la taille et du masque alloué à chaque sous réseaux
function taille_mask_sous_res($taille_sous_res){
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
function mask_cdri_vers_dec($mask_actuel)
{
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

#Calcul de l'adresse, du broadcast et de la plage d'adresse de chaque sous réseaux
function addr_broad_plage_sous_res($addr,$mask,$taille_alloue){
    $premierPlage = $addr + 1;
    $dernierPlage = $premierPlage + ($taille_alloue - 1);
    $Plage = long2ip($premierPlage) . ' - ' . long2ip($dernierPlage);
    $broadcast = $dernierPlage + 1;

    return [$addr,$Plage,$broadcast];
}