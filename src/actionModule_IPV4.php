<?php
if(isset($_POST['ok_calc'], $_POST['nb_res'], $_POST['addr'], $_POST['mask'])){
    $nb_res = $_POST['nb_res'];
    $addr = $_POST['addr'];
    $mask = $_POST['mask'];
    $nb_hosts = (2**(32-$mask))-2;
}
?>




























