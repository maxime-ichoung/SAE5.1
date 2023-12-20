<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                <li class="breadcrumb-item active" aria-current="page">Module 3 : IPV6</li>
            </ol>
        </nav>

        <h2>Formulaire IPV6</h2>

        <form action="Module_IPV6.php" method="post">
            <label for="ipv6">Adresse IPv6:</label><br>
            <input class="form-control" type="text" id="ipv6" name="ipv6" pattern="^([0-9a-fA-F]{0,4}:){1,7}[0-9a-fA-F]{0,4}$" required>
            <small>Entrez une adresse IPv6 valide. Par exemple: 2001:0db8:85a3:0000:0000:8a2e:0370:7334</small><br>
            <input type="submit" value="Envoyer" class="btn btn-primary">
        </form>

        <?php
        require ("actions/actionModule_IPV6.php");

        if(isset($_POST['ipv6'])){
            $ipv6 = $_POST['ipv6'];
            $ipv6_simplifiee = ipv6_simplifiee($ipv6);
            $resultat = binaire_poids_fort($ipv6);
            echo "<strong>Adresse IPV6 simplifiée : </strong>" . $ipv6_simplifiee;
            echo '<br><strong>Affichage binaire et hexadécimal des deux octets les plus significatifs : </strong>';
            echo '<br><strong>Hexa: </strong>' . $resultat['hexa'] . ' ; <strong>Binaire: </strong>' . $resultat['binaire'];
            for ($i = 0; $i < 2; $i++) {
                echo '<br><strong>Hexa: </strong>' . substr($resultat['hexa'], $i*2, 2) . ' ; <strong>Binaire: </strong>' . substr($resultat['binaire'], $i*8, 8);
            }
        }
        ?>
    </main>

    <?php include("Footer.html") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>