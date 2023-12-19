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