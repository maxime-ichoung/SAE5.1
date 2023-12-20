<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="styles/styles.css" rel="stylesheet">
    <title>Accueil</title>
    <style>
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
        <!-- Fil d'ariane -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </nav>

        <p>Bienvenue sur la page d'accueil</p>

        <div class="row">
            <div class="col-auto">
                <div class="card">
                    <div class="card-body">
                        <a href="Module_ping.php">
                            <figure>
                                <img src="https://picsum.photos/id/287/250/300" alt="Mountains">
                                <figcaption>Module Ping</figcaption>
                            </figure>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="card">
                    <div class="card-body">
                        <a href="Module_IPV4.php">
                            <figure>
                                <img src="https://picsum.photos/id/287/250/300" alt="Mountains">
                                <figcaption>Module IPV4</figcaption>
                            </figure>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="card">
                    <div class="card-body">
                        <a href="Module_IPV6.phpphp">
                            <figure>
                                <img src="https://picsum.photos/id/287/250/300" alt="Mountains">
                                <figcaption>Module IPV6</figcaption>
                            </figure>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php include("Footer.html") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>