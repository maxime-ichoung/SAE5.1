<?php
if(isset($_POST['ok_calc'], $_POST['nb_res'], $_POST['addr'], $_POST['mask'])){
    $nb_res = $_POST['nb_res'];
    $addr = $_POST['addr'];
    $mask = $_POST['mask'];
    $nb_hosts = (2**(32-$mask))-2;
    # Algorithme de calcul de la taille et du masque alloué à chaque sous réseaux
    $taille_alloue_totale = 0;
    for($i=1; $i<=$nb_res; $i++){
        $taille_res = 'taille_res_'.$i;
        $taille_actuel = $_POST[$taille_res];
        for($j=30; $j>8; $j--){
            $taille_alloue = (2**(32-$j))-2;
            if($taille_actuel <= $taille_alloue){
                ${'taille_alloue_'.$i} = $taille_alloue;
                ${'mask_'.$i} = $j;
                $taille_alloue_totale += $taille_alloue;
                break;
            }
        }
    }
    # Mécanisme de filtration des demandes de divisions trop grandes par rappport au réseau fournis
    if($taille_alloue_totale > $nb_hosts-$nb_res){
        echo "
        <form id='form_erreur_taille' action='Module_IPV4.php' method='post'>
        <input type='hidden' name='erreur_taille' value='1'>
        </form>
        <script type='text/javascript'>
            document.getElementById('form_erreur_taille').submit();
        </script>";
    }
    # Algorithme de conversion masque CIDR vers masque décimaux
    function mask_cdri_vers_dec($mask_actuel){
        $mask_dec = '';
        $packet_bits = 1;
        while($mask_actuel >= 8){
            $mask_dec = $mask_dec.'255';
            if($packet_bits <= 3){
                $mask_dec = $mask_dec.'.';
            }
            $mask_actuel = $mask_actuel-8;
            $packet_bits++;
        }
        while($packet_bits<=4){
            if($mask_actuel!=0){
                $der_part_non_null = 255-(2**(8-$mask_actuel))+1;
                $mask_dec = $mask_dec.$der_part_non_null;
                $mask_actuel = 0;
            }
            else{
                $mask_dec = $mask_dec.'0';
            }
            if($packet_bits <= 3){
                $mask_dec = $mask_dec.'.';
            }
            $packet_bits++;
        }
        return $mask_dec;
    }
    # Calcul des masques décimaux des sous réseaux
    for($k=1; $k<=$nb_res; $k++){
        $mask_actuel = ${'mask_'.$k};
        ${'mask_dec_'.$k} = mask_cdri_vers_dec($mask_actuel);
    }
    # Calcul du masque décimal du réseau principal
    $mask_major = mask_cdri_vers_dec($mask);
    #Calcul de l'adresse, du broadcast et de la plage d'adresse de chaque sous réseaux

    $addr_bin = ip2long($addr);
    $mask_res_bin = -1 << (32 - $mask);

    $addr_sous_res_1 = $addr_bin & $mask_res_bin;
    $premierPlage_1 = $addr_sous_res_1 + 1;
    $dernierPlage_1 = $premierPlage_1 + ($taille_alloue_1-1);
    $Plage_1 = long2ip($premierPlage_1).' - '.long2ip($dernierPlage_1);
    $broadcast_1 = $dernierPlage_1 + 1;


    for($i=2;$i<=$nb_res;$i++){
        ${'addr_sous_res_'.$i} = ${'broadcast_'.($i-1)} + 1;
        ${'premierPlage_'.$i} = ${'addr_sous_res_'.$i} + 1;
        ${'dernierPlage_'.$i} = ${'premierPlage_'.$i} + (${'taille_alloue_'.$i}-1);
        ${'Plage_'.$i} = long2ip(${'premierPlage_'.$i}).' - '.long2ip(${'dernierPlage_'.$i});
        ${'broadcast_'.$i} = ${'dernierPlage_'.$i} + 1;
    }
}
echo "<table>";
echo "<tr><th><p>Sous réseaux</p></th><th><p>Taille souhaitée</p></th><th><p>Taille allouée</p></th><th><p>Adresse</p></th><th><p>Masque</p></th><th><p>Masque décimal</p></th><th><p>Ensemble d'adresse attribuable</p></th><th><p>Broadcast</p></th></tr>";
$res = 1;
while($res < $nb_res+1){
    $taille_res = 'taille_res_'.$res;
    echo "<tr>";
    echo "<td>$res</td>";
    echo "<td>"; echo $_POST[$taille_res]; echo"</td>";
    echo "<td>"; echo ${'taille_alloue_'.$res}; echo "</td>";
    echo "<td>"; echo long2ip(${'addr_sous_res_'.$res}); echo "</td>";
    echo "<td>"; echo '/'.${'mask_'.$res}; echo "</td>";
    echo "<td>"; echo ${'mask_dec_'.$res}; echo "</td>";
    echo "<td>"; echo ${'Plage_'.$res}; echo"</td>";
    echo "<td>"; echo long2ip(${'broadcast_'.$res}); echo"</td>";
    echo "</tr>";
    $res++;
}
echo "</table>";