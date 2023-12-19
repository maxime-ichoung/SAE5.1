<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Module IPV4</title>
</head>
<body onload="alert_taille()">
<?php
if(isset($_POST['nb_res'])){
    $nb_res = $_POST['nb_res'];
}
else{
    $nb_res = 4;
}
?>
<form action="./Module_IPV4.php" method="post" name="formul_nb_res" id="formul_nb_res">
    Nombre de sous réseaux souhaités : <input type="number" name="nb_res" value="<?php echo $nb_res ?>">  <input type="submit" value="Valider" name="ok_nb_res">
</form>
<br>
<form action="./actionModule_IPV4.php" method="post" name="formul_sous_res" onsubmit="return valider()" id="formul_sous_res">
    Adresse IPV4 : <input type="text" name="addr" required pattern="^((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])$"> / <input type="number" name="mask" min="1" max="32" required>
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
</body>
</html>