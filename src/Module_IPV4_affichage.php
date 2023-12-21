<?php session_start(); ?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
    <title>Accueil</title>
</head>
<body>
<?php include("Header.html") ?>

<main class="container mt-5">
    <!-- Fil d'ariane -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="Home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="Module_IPV4.php">Module 2 : IPV4</a></li>
            <li class="breadcrumb-item active" aria-current="page">Affichage des resultats du module IPV4</li>
        </ol>
    </nav>

    <?php
    if(isset($_POST['ok_calc'], $_POST['nb_res'], $_POST['addr'], $_POST['mask'])) {
        require ("actions/actionModule_IPV4.php");
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
                <form id='form_erreur_taille' action='Module_IPV4.php' method='post'>
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
            $tamp = addr_broad_plage_sous_res($addr_sous_res,${'taille_alloue_'.$i});
            ${'addr_sous_res_' . $i} = $tamp[0];
            ${'Plage_' . $i} = $tamp[1];
            ${'broadcast_' . $i} = $tamp[2];
            $addr_sous_res = ${'broadcast_' . $i} +1;
            $mask_sous_res = ${'mask_' . $i};
        }
    }
    ?>

    <!-- Tableau d'affichage dynamique -->
    <div class="table-responsive mt-5">
        <table class="table table-striped align-middle">
            <thead>
            <tr>
                <th scope="col">Sous réseaux</th>
                <th scope="col">Taille souhaitée</th>
                <th scope="col">Taille allouée</th>
                <th scope="col">Adresse</th>
                <th scope="col">Masque</th>
                <th scope="col">Masque décimal</th>
                <th scope="col">Ensemble d'adresse attribuable</th>
                <th scope="col">Broadcast</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($res = 1; $res <= $nb_res; $res++) {
                $taille_res = 'taille_res_' . $res;
                echo "<tr>";
                echo "<th scope='row'>$res</th>";
                echo "<td>" . $_POST[$taille_res] . "</td>";
                echo "<td>" . ${'taille_alloue_' . $res} . "</td>";
                echo "<td>" . long2ip(${'addr_sous_res_' . $res}) . "</td>";
                echo "<td>/" . ${'mask_' . $res} . "</td>";
                echo "<td>" . ${'mask_dec_' . $res} . "</td>";
                echo "<td>" . ${'Plage_' . $res} . "</td>";
                echo "<td>" . long2ip(${'broadcast_' . $res}) . "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</main>

<?php include("Footer.html") ?>

<script src="scripts/bootstrap.bundle.min.js"></script>
</body>
</html>