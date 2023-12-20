<?php session_start(); ?>
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
                <li class="breadcrumb-item"><a href="Module_IPV4.php">Module 2 : IPV4</a></li>
                <li class="breadcrumb-item active" aria-current="page">Affichage IPV4</li>
            </ol>
        </nav>

        <?php
        if(isset($_POST['nb_res'])){
            $nb_res = $_POST['nb_res'];
        }
        else{
            $nb_res = 4;
        }
        if(isset($_POST['addr'])){
            $addr_aff = $_POST['addr'];
        }
        else{
            $addr_aff = '';
        }
        if(isset($_POST['mask'])){
            $mask_aff = $_POST['mask'];
        }
        else{
            $mask_aff = '';
        }
        ?>
        <form action="actions/actionModule_IPV4.php" method="post" name="formul_nb_res" id="formul_nb_res">
            Nombre de sous réseaux souhaités : <input type="number" name="nb_res" value="<?php echo $nb_res ?>">  <input type="submit" value="Valider" name="ok_nb_res">
        </form>
        <br>
        <form action="actions/actionModule_IPV4.php" method="post" name="formul_sous_res" onsubmit="return valider()" id="formul_sous_res">
            Adresse IPV4 : <input type="text" name="addr" required pattern="^((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])$" value="<?php echo $addr_aff ?>"> / <input type="number" name="mask" min="1" max="32" value="<?php echo $mask_aff ?>" required>
            <br>
            <br>
            <?php
            echo "<table>";
            echo "<tr><th><p>Sous réseaux</p></th><th><p>Taille</p></th></tr>";
            $res = 1;
            while($res < $nb_res+1){
                $taille_res = 'taille_res_'.$res;
                echo "<tr>";
                echo "<td>$res</td>";
                echo "<td><input type='number' name=$taille_res min='1' required> </td>";
                echo "</tr>";
                $res++;
            }
            echo "</table>
        <input type='hidden' name='nb_res' value=$nb_res>
        ";

            ?>
            <br>
            <br>
            <input type="submit" value="Calculer" name="ok_calc">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>