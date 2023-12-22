<!DOCTYPE html>
<?php session_start(); ?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
    <link rel="icon" href="assets/logo/logo.png">
    <title>IPV6</title>
</head>
<body>
<?php include("Header.html") ?>

<main class="container mt-5">
    <!-- Fil d'ariane -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="Module_IPV6.php">Module 3 : IPV6</a></li>
            <li class="breadcrumb-item active" aria-current="page">Affichage des resultats du module IPV6</li>
        </ol>
    </nav>

<h2 class="mb-4">Affichage des octets de poids fort et simplification IPV6</h2>

    <?php
    require ("actions/actionModule_IPV6.php");

    if(isset($_POST['ipv6'])){
        $ipv6 = $_POST['ipv6'];
        $ipv6_simplifiee = simplifyV2($ipv6);
        $resultat = binaire_poids_fort($ipv6);
        $type = type_ipv6($ipv6_simplifiee);
        echo "<strong>Adresse IPV6 simplifiée : </strong>" . $ipv6_simplifiee;
        echo '<br><strong>Affichage binaire et hexadécimal des deux octets les plus significatifs : </strong>';
        echo '<br><strong>Hexa: </strong>' . $resultat['hexa'] . ' ; <strong>Binaire: </strong>' . $resultat['binaire'];
        for ($i = 0; $i < 2; $i++) {
            echo '<br><strong>Hexa: </strong>' . substr($resultat['hexa'], $i*2, 2) . ' ; <strong>Binaire: </strong>' . substr($resultat['binaire'], $i*8, 8);
        }
        echo "<br><strong>Type d'adresse : </strong>" . $type;
    }
    ?>
</main>

<?php include("Footer.html") ?>

<script src="scripts/bootstrap.bundle.min.js"></script>
</body>
</html>