<?php
if(isset($_POST['ok_calc'], $_POST['nb_res'], $_POST['addr'], $_POST['mask'])) {
    require "fichier_fonction_temporaire_moduleIPV4.php";
    $nb_res = $_POST['nb_res'];
    $addr = $_POST['addr'];
    $mask = $_POST['mask'];
    $nb_hosts = (2 ** (32 - $mask)) - 2;

    # Calcul de la taille et du masque alloué à chaque sous réseaux ainsi que de la taille cumulé des sous réseaux
    $taille_alloue_totale = 0;
    for ($i = 1; $i <= $nb_res; $i++) {
        $taille_res = 'taille_res_' . $i;
        $taille_actuel = $_POST[$taille_res];
        $tamp = taille_mask_sous_res($taille_actuel);
        ${'taille_alloue_' . $i} = $tamp[0];
        ${'mask_' . $i} = $tamp[1];
    }

    # Mécanisme de filtration des demandes de divisions trop grandes par rappport au réseau fournis
    if ($taille_alloue_totale > $nb_hosts - $nb_res) {
        echo "
        <form id='form_erreur_taille' action='../Module_IPV4.php' method='post'>
        <input type='hidden' name='erreur_taille' value='1'>
        </form>
        <script type='text/javascript'>
            document.getElementById('form_erreur_taille').submit();
        </script>";
    }

    # Calcul des masques décimaux des sous réseaux
    for ($k = 1; $k <= $nb_res; $k++) {
        $mask_actuel = ${'mask_' . $k};
        ${'mask_dec_' . $k} = mask_cdri_vers_dec($mask_actuel);
    }

    # Calcul du masque décimal du réseau principal
    $mask_major = mask_cdri_vers_dec($mask);

    # Calcul de l'adresse, du broadcast et de la plage d'adresse de chaque sous réseaux
    $addr_bin = ip2long($addr);
    $mask_sous_res = -1 << (32 - $mask);
    $addr_sous_res = $addr_bin & $mask_sous_res;
    for ($i = 1; $i <= $nb_res; $i++) {
        $tamp = addr_broad_plage_sous_res($addr_sous_res,$mask_sous_res,${'taille_alloue_'.$i});
        ${'addr_sous_res_' . $i} = $tamp[0];
        ${'Plage_' . $i} = $tamp[1];
        ${'broadcast_' . $i} = $tamp[2];
        $addr_sous_res = ${'broadcast_' . $i} +1;
        $mask_sous_res = ${'mask_' . $i};
    }

    # Tableau d'affichage dynamique
    echo "<table>";
    echo "<tr><th><p>Sous réseaux</p></th><th><p>Taille souhaitée</p></th><th><p>Taille allouée</p></th><th><p>Adresse</p></th><th><p>Masque</p></th><th><p>Masque décimal</p></th><th><p>Ensemble d'adresse attribuable</p></th><th><p>Broadcast</p></th></tr>";
    $res = 1;
    while ($res < $nb_res + 1) {
        $taille_res = 'taille_res_' . $res;
        echo "<tr>";
        echo "<td>$res</td>";
        echo "<td>";
        echo $_POST[$taille_res];
        echo "</td>";
        echo "<td>";
        echo ${'taille_alloue_' . $res};
        echo "</td>";
        echo "<td>";
        echo long2ip(${'addr_sous_res_' . $res});
        echo "</td>";
        echo "<td>";
        echo '/' . ${'mask_' . $res};
        echo "</td>";
        echo "<td>";
        echo ${'mask_dec_' . $res};
        echo "</td>";
        echo "<td>";
        echo ${'Plage_' . $res};
        echo "</td>";
        echo "<td>";
        echo long2ip(${'broadcast_' . $res});
        echo "</td>";
        echo "</tr>";
        $res++;
    }
    echo "</table>";
    echo "<br>";
    echo "<a href='../Module_IPV4.php'>Retour au formulaire</a>";
}