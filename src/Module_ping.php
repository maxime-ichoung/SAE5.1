<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
    <title>Ping</title>
</head>
<body>
    <?php include("Header.html") ?>

    <main class="container mt-5">
        <!-- Fil d'ariane -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Ping</li>
            </ol>
        </nav>

        <h2>Ping une Adresse Web/IP</h2>
        <input type="text" id="addresse" placeholder="Entrez une adresse web ou IP">
        <input type="number" id="nb_ping" value="4" min="1" max="10" placeholder="Nombre de pings (max 10)">
        <button label="adress" onclick="ping()">Ping</button>
        <div id="result"></div>


        
    </main>

    <?php include("Footer.html") ?>

    <script src="scripts/bootstrap.bundle.min.js"></script>
    <script src="scripts/Module_ping.js"></script>
</body>
</html>