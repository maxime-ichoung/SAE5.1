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

function binaire_poids_fort($address) {
    $packed_address = inet_pton($address);
    $hex_str = bin2hex($packed_address);
    $binary_str = '';
    $hex_str_result = '';

    for ($i = 0; $i < 4; $i++) {
        $byte = substr($hex_str, $i*2, 2);
        $binary_byte = base_convert($byte, 16, 2);
        $binary_byte_padded = str_pad($binary_byte, 8, '0', STR_PAD_LEFT);
        $binary_str .= $binary_byte_padded . ' ';
        $hex_str_result .= strtoupper($byte) . ' ';
    }

    return array('binaire' => trim($binary_str), 'hexa' => trim($hex_str_result));
}

$result = binaire_poids_fort($ipv6);
echo '<br>Adresse IPv6 simplifiée : ' . ipv6_simplifiee($ipv6);
echo '<br>Affichage binaire et hexadécimal des deux octets les plus significatifs : ';
for ($i = 0; $i < 4; $i++) {
    echo '<br>Hexa: ' . substr($result['hexa'], $i*3, 2) . ', Binaire: ' . substr($result['binaire'], $i*9, 8);
}