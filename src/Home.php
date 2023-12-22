<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
    <title>Accueil</title>
    <style>
        a {
            text-decoration: none;
        }
        figure {
            display: grid;
            border-radius: 1rem;
            overflow: hidden;
            cursor: pointer;
        }
        figure > * {
            grid-area: 1/1;
            transition: .4s;
        }
        figure figcaption {
            display: grid;
            align-items: end;
            font-family: sans-serif;
            font-size: 2.3rem;
            font-weight: bold;
            color: #0000;
            padding: .75rem;
            background: var(--c,#0009);
            clip-path: inset(0 var(--_i,100%) 0 0);
            -webkit-mask:
                    linear-gradient(#000 0 0),
                    linear-gradient(#000 0 0);
            -webkit-mask-composite: xor;
            -webkit-mask-clip: text, padding-box;
            margin: -1px;
        }
        figure:hover figcaption{
            --_i: 0%;
        }
        figure:hover img {
            transform: scale(1.2);
        }
        @supports not (-webkit-mask-clip: text) {
            figure figcaption {
                -webkit-mask: none;
                color: #fff;
            }
        }
        body {
            place-content: center;
        }
    </style>
</head>
<body>
    <?php include("Header.html") ?>

    <main class="container mt-5">

        <h2 class="mb-5 d-flex justify-content-center align-items-center">Bienvenue sur la page d'accueil</h2>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-auto">
                <a href="Module_ping.php">
                    <figure>
                        <img src="../assets/images/Ping.jpg" width="300px" alt="Mountains">
                        <figcaption>Module Ping</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-auto">
                <a href="Module_IPV4.php">
                    <figure>
                        <img src="../assets/images/IPV4.jpg" width="300px" alt="Mountains">
                        <figcaption>Module IPV4</figcaption>
                    </figure>
                </a>
            </div>
            <div class="col-auto">
                <a href="Module_IPV6.php">
                    <figure>
                        <img src="../assets/images/IPV6.jpg" width="300px" alt="Mountains">
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