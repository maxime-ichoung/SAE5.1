<?php
if(isset($_POST['ipv6'])){
    $ipv6 = $_POST['ipv6'];
    echo $ipv6;
}
// Parse l'ipv6 a chaque :
$parse_ipv6 = explode(":", $ipv6);
echo "<br>";


// Enlève tous les 0 du debut de chaque chaine de parse_ipv6
for ($i = 0; $i < sizeof($parse_ipv6) - 1; $i++){
    $parse_ipv6[$i] = ltrim($parse_ipv6[$i], "0");
}


foreach ($parse_ipv6 as $part){
    echo $part . ":";
}

function ipv6_simplifiee($address){
    return inet_ntop(inet_pton($address));
}

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
        $chaineBinaire .= $octetBinaire . ' ';
        // Ajoute l'octet hexa à la chaîne hexa
        $chaineHexResultat .= strtoupper($octet) . ' ';
    }

    return array('binaire' => $chaineBinaire, 'hexa' => $chaineHexResultat);
}


$result = binaire_poids_fort($ipv6);
echo '<br>Adresse IPv6 simplifiée : ' . ipv6_simplifiee($ipv6);
echo '<br>Affichage binaire et hexadécimal des deux octets les plus significatifs : ';
for ($i = 0; $i < 2; $i++) {
    echo '<br>Hexa: ' . substr($result['hexa'], $i*3, 2) . ', Binaire: ' . substr($result['binaire'], $i*9, 8);
}