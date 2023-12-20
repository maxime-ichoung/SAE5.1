<?php
function simplifyV2($adresse){
    //Parcours de la chaine de caractère afin de trouver le plus grand enchainement de "0"
    $deb = 0; $fin = 0; $compt = 0; $compt_final = 0;
    for ($i = 0 ; $i < strlen($adresse)-1;$i++){ //premier tour de boucle afin de trouver le plus grand enchaine de "0"
        $j = $i;
        while ($j < strlen($adresse)-1 and $adresse[$j] == "0" or $adresse[$j] == ":" ){ //récupère index de deb et de fin de cette suite de 0

            if ($j == 0){ // Cas particulier où l'on commence sur un enchainement de 0
                $compt = 1;
            }
            if ($adresse[$j] == ":" and $compt%5 != 0){ //Calcule le nombre de 0 comme ci chaque couple étais complets
                $compt = $compt + (5 - $compt%5);
            }
            else {$compt++;}
            $j++;
        }
        if ($j == strlen($adresse)-1){ //Si l'on est arrivé a la fin de la chaine de caractère
            $deb = $i; $fin = $j;
            break;
        }
        if ($compt_final < $compt){ //Vérif si l'on trouve une chaine plus grande
            $compt_final = $compt;
            while ($adresse[$j-1] != ":"){
                $j = $j-1; $compt_final = $compt_final -1;
            }
            $fin = $j;
            $deb = $fin - $compt_final;
        }

        $compt = 0;
    }
    //Supression de cet enchainement de "0"
    if ($compt_final > 6 or $j == strlen($adresse)-1){
        if ($fin == strlen($adresse)-1){
            $adresseSimple = substr($adresse,0,$deb) . "::";
        }
        else if ($deb == 0){
            $adresseSimple = ":" . substr($adresse,$fin-1);
        }
        else{
            $adresseSimple = substr($adresse,0,$deb+1) . substr($adresse,$fin-1);
        }
    }
    else { $adresseSimple = $adresse;}

    //On enlève maintenant l'ensemble des 0 inutile
    $segments = explode(':', $adresseSimple);
    //On exécute un premier tour de boucle afin de vérifier si il existe un segment déjà vide
    if (count($segments) == 3){ //Cas particulier ou l'on n'as eu une adresse entièrement composé de 0
        if (empty($segments[0] and $segments[1] and $segments[2] )){return $adresseSimple;}
    }
    for ($i=0;$i < count($segments)-1;$i++){
        if (empty($segments[$i])){
            $compt = $i;
        }
    }
    // On parcours l'ensemble des segments pour en retiré les 0
    if ($compt == 1){$i =1;} else{$i = 0;} //cas particulier l'enchainement de 0 se fait au début
    for ($i ; $i< count($segments)-1; $i++) {
        // Supprimer les zéros non significatifs
        $segments[$i] = ltrim($segments[$i], '0');
        // Si un segment est vide (c'était que des 0), le remplacer par '0'
        if (empty($segments[$i]) and $i != $compt) {
            $segments[$i] = '0';
        }
    }
    // Reconstruire l'adresse IPv6
    $adresseSimple =  implode(':', $segments);
    return $adresseSimple;
}
/***
* @param $adresse
* @return string[]
 */
function binaire_poids_fort($adresse) {
    $ipv6Binaire = inet_pton($adresse);
    $chaineHex = bin2hex($ipv6Binaire);
    $chaineBinaire = '';
    $chaineHexResultat = '';

    // Boucle sur les 4 premiers octets de la chaîne hexadécimale
    for ($i = 0; $i < 2; $i++) {
        // Extrait un octet (2 caractères hexa) de la chaîne hexa
        $octet = substr($chaineHex, $i*2, 2);
        // Convertit l'octet hexadécimal en binaire et le remplit à gauche avec des zéros pour obtenir 8 bits
        $octetBinaire = str_pad(base_convert($octet, 16, 2), 8, '0', STR_PAD_LEFT);
        // Ajoute l'octet binaire à la chaîne binaire
        $chaineBinaire .= $octetBinaire;
        // Ajoute l'octet hexa à la chaîne hexa
        $chaineHexResultat .= strtoupper($octet);
    }

    return array('binaire' => $chaineBinaire, 'hexa' => $chaineHexResultat);
}