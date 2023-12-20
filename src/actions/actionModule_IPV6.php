<?php
function ipv6_simplifiee($adresse){
    /**
     * Cette fonction à pour but de simplifier une ipv6
     *
     * Entrée : string
     *
     * Sortie : String
     */

    // Parse l'ipv6 a chaque :

    $parse_ipv6 = explode(":", $adresse);
    echo "<br>";

    // Enlève tous les 0 du debut de chaque chaine de parse_ipv6
    for ($i = 0; $i < sizeof($parse_ipv6); $i++){
        $parse_ipv6[$i] = ltrim($parse_ipv6[$i], "0");
    }

    $compt = 0; //Compteur visant à ne simplifier un double "0000" qu'une seule fois
    $strAdresse = implode(":", $parse_ipv6); //Transformation de la liste en chaine de caractère
    for ($i =0; $i<strlen($strAdresse);$i++){ //Parcours chaine
        if ($i == 0 and $strAdresse[$i] == ":" and $strAdresse[$i+1] == ":"){
            if ($strAdresse[$i+2] == ":"){
                $j = $i;
                while ($strAdresse[$j +2] == ":"){ //Boucle si jamais il y a plus de 2 "0000"
                    $j ++;
                }
                $addAvant = substr($strAdresse, 0, $i); //Tout avant position i, non compris
                $addApres = substr($strAdresse, $j); //Tout apres position i, i non compris
                $strAdresse = $addAvant . $addApres;
                $compt = 1;
            }
            else {
                $compt = 1;
            }
            $i++;
        }
        else if($i < strlen($strAdresse)-2 and $strAdresse[$i] == ":" and $strAdresse[$i+2] == ":" and $compt != 1){ //Suppression d'un ":" dans un triple ":"
            $j = $i;
            while ($strAdresse[$j +2] == ":"){ ////Boucle si jamais il y a plus de 2 "0000"
                $j ++;
            }
            $addAvant = substr($strAdresse, 0, $i); //Tout avant position i, non compris
            $addApres = substr($strAdresse, $j); //Tout apres position i, i non compris
            $strAdresse = $addAvant . $addApres;
            $compt = 1;
            $i++;
        }
        else if (($i == strlen($strAdresse)-2 and $compt==0 and $strAdresse[$i] == ":" and $strAdresse[$i] == ":" )){
            $compt =1;
        }
        else if ($i < strlen($strAdresse)-1 and $strAdresse[$i] == ":" and $strAdresse[$i+1] == ":") { //Mise en place d'un "0" entre un double ":"
            $addAvant = substr($strAdresse, 0, $i + 1); //Tout avant position i
            $addApres = substr($strAdresse, $i + 1); //Tout apres position i
            $strAdresse = $addAvant . "0" . $addApres;
        }
    }
    if ($strAdresse[strlen($strAdresse)-1] == ":" and $strAdresse[strlen($strAdresse)-2] != ":"){
        $strAdresse = $strAdresse . "0";
    }
    return $strAdresse;
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