<?php session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
    <title>Accueil</title>
</head>
<body onload="alert_taille()">
    <?php include("Header.html") ?>

    <main class="container mt-5">
        <!-- Fil d'ariane -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="Home.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Module 2 : IPV4</li>
            </ol>
        </nav>

        <?php
        $nb_res = $_POST['nb_res'] ?? 4;
        $addr_aff = $_POST['addr'] ?? '';
        $mask_aff = $_POST['mask'] ?? '';
        ?>

        <form action="./Module_IPV4.php" method="post" name="formul_nb_res" id="formul_nb_res" class="row g-3">
            <div class="col-auto">
                <label for="nb_res" class="form-label">Nombre de sous réseaux souhaités :</label>
            </div>
            <div class="col-auto">
                <input type="number" class="form-control" id="nb_res" name="nb_res" value="<?php echo $nb_res ?>">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary" name="ok_nb_res">Valider</button>
            </div>
        </form>
        <br>

        <form action="Module_IPV4_affichage.php" method="post" name="formul_sous_res" onsubmit="return valider()" id="formul_sous_res" class="row g-3 mb-5">
            <div class="col-md-auto">
                <label for="addr" class="form-label">Adresse IPV4 :</label>
            </div>
            <div class="col-md-8">
                <div class="input-group">
                    <input type="text" class="form-control" id="addr" name="addr" required pattern="^((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])$" value="<?php echo $addr_aff ?>">
                    <span class="input-group-text">/</span>
                    <input type="number" class="form-control" id="mask" name="mask" min="1" max="32" value="<?php echo $mask_aff ?>" required>
                </div>
            </div>
            <div class="col-md-auto">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Sous réseaux</th>
                        <th scope="col">Taille</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $res = 1;
                    while($res < $nb_res+1){
                        $taille_res = 'taille_res_'.$res;
                        echo "<tr>";
                        echo "<th scope='row'>$res</th>";
                        echo "<td><input type='number' name=$taille_res class='form-control' min='1' required> </td>";
                        echo "</tr>";
                        $res++;
                    }
                    echo "</tbody></table>";
                    echo "<input type='hidden' name='nb_res' value=$nb_res>";
                    ?>

            <button type="submit" class="btn btn-primary" name="ok_calc">Calculer</button>
        </form>

        <?php
        if(isset($_POST['erreur_taille'])){
            unset($_POST['erreur_taille']);
            echo "
        <script type='text/javascript'>
            function alert_taille(){
                alert('Réseaux principal trop petit. Veuillez réduire la taille et/ou le nombre de vos sous réseaux.');
            }
        </script>
        ";
        }
        ?>
    </main>

    <?php include("Footer.html") ?>

    <script src="scripts/bootstrap.bundle.min.js"></script>
</body>
</html>
