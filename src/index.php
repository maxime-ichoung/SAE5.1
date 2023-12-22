<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
    <link href="styles/index.css" rel="stylesheet">
    <link rel="icon" href="assets/logo/logo.png">
    <title>Accueil</title>

</head>
<body>
    <?php include("Header.html") ?>

    <main class="container mt-5">

        <h2 class="mb-5 d-flex justify-content-center align-items-center">Bienvenue sur la page d'accueil</h2>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-auto">
                <a href="Module_ping.php">
                    <figure>
                        <img src="assets/images/Ping.jpg" alt="Module Ping">
                        <figcaption>Module Ping</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-auto">
                <a href="Module_IPV4.php">
                    <figure>
                        <img src="assets/images/IPV4.jpg" alt="Module IPV4">
                        <figcaption>Module IPV4</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-auto">
                <a href="Module_IPV6.php">
                    <figure>
                        <img src="assets/images/IPV6.jpg" alt="Module IPV6">
                        <figcaption>Module IPV6</figcaption>
                    </figure>
                </a>
            </div>
        </div>
    </main>

    <?php include("Footer.html") ?>

    <script src="scripts/bootstrap.bundle.min.js"></script>
</body>
</html>
