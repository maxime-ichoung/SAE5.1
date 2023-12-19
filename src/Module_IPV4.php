<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Module IPV4</title>
</head>
<body>
<?php
if(isset($_POST['nb_res'])){
    $nb_res = $_POST['nb_res'];
}
else{
    $nb_res = 6;
}
?>
<form action="./Module_IPV4.php" method="post" name="formul_nb_res" id="formul_nb_res">
Nombre de sous réseaux souhaités : <input type="number" name="nb_res" value="<?php echo $nb_res ?>">  <input type="submit" value="Valider" name="ok_nb_res">
</form>
<br>
</body>
</html>