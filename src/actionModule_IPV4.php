<?php
if(isset($_POST['ok_calc'], $_POST['nb_res'], $_POST['addr'], $_POST['mask'])){
    $nb_res = $_POST['nb_res'];
    $addr = $_POST['addr'];
    $mask = $_POST['mask'];
    $nb_hosts = (2**(32-$mask))-2;
    echo $nb_hosts;
    # Algorithme de calcul de la taille et du masque alloué à chaque sous réseaux
    for($i=1; $i<=$nb_res; $i++){
        $taille_res = 'taille_res_'.$i;
        $taille_actuel = $_POST[$taille_res];
        for($j=30; $j>8; $j--){
            $taille_alloue = (2**(32-$j))-2;
            if($taille_actuel <= $taille_alloue){
                ${'taille_alloue'.$i} = $taille_alloue;
                ${'mask'.$i} = $j;
                break;
            }
        }
    }
}


echo "<table>";
echo "<tr><th><p>Sous réseaux</p></th><th><p>Taille souhaitée</p></th><th><p>Taille allouée</p></th><th><p>Adresse</p></th><th><p>Masque</p></th><th><p>Ensemble d'adresse attribuable</p></th><th><p>Broadcast</p></th></tr>";
$res = 1;
while($res < $nb_res+1){
    $taille_res = 'taille_res_'.$res;
    echo "<tr>";
    echo "<td>$res</td>";
    echo "<td>"; echo $_POST[$taille_res]; echo"</td>";
    echo "<td>"; echo ${'taille_alloue'.$res}; echo "</td>";
    echo "<td>"; echo "</td>";
    echo "<td>"; echo '/'.${'mask'.$res}; echo "</td>";
    echo "</tr>";
    $res++;
}
echo "</table>";