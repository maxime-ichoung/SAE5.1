<?php
if(isset($_POST['ok_calc'], $_POST['nb_res'], $_POST['addr'], $_POST['mask'])){
    $nb_res = $_POST['nb_res'];
    $addr = $_POST['addr'];
    $mask = $_POST['mask'];
    $nb_hosts = (2**(32-$mask))-2;
    echo $nb_hosts;
}


echo "<table>";
echo "<tr><th><p>Sous réseaux</p></th><th><p>Taille souhaitée</p></th><th><p>Taille allouée</p></th><th><p>Adresse</p></th><th><p>Masque</p></th><th><p>Ensemble d'adresse attribuable</p></th><th><p>Broadcast</p></th></tr>";
$res = 1;
while($res < $nb_res+1){
    $taille_res = 'taille_res_'.$res;
    echo "<tr>";
    echo "<td>$res</td>";
    echo "<td>"; echo $_POST[$taille_res]; echo"</td>";
    echo "</tr>";
    $res++;
}
echo "</table>";



























