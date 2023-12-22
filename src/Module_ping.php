<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
    <link rel="icon" href="../assets/logo/logo.png">
    <title>Ping</title>
</head>
<body>
    <?php include("Header.html") ?>

    <main class="container mt-5">
        <!-- Fil d'ariane -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Module 1 : Ping</li>
            </ol>
        </nav>


        <h2>Ping une Adresse Web/IP</h2>

        <form id="pingForm">
            <div class="mb-3">
                <label for="addresse" class="form-label">Adresse Web/IP:</label>
                <input type="text" class="form-control" id="addresse" placeholder="Entrez une adresse web ou IP">
            </div>
            <div class="mb-3">
                <label for="nb_ping" class="form-label">Nombre de pings (max 10):</label>
                <input type="number" class="form-control" id="nb_ping" value="4" min="1" max="10">
            </div>
            <button type="button" class="btn btn-primary" onclick="ping()">Ping</button>
        </form>

        <div id="result" class="mt-4"></div>
    </main>

    <?php include("Footer.html") ?>

    <script src="scripts/bootstrap.bundle.min.js"></script>
    <script src="scripts/Module_ping.js"></script>
</body>
</html>
