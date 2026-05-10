<?php
    session_start();
    include('./includes/config.inc.php');

    $keresett_oldal = isset($_GET['oldal']) ? $_GET['oldal'] : '/';

    if (isset($oldalak[$keresett_oldal])) {
        if (file_exists("./templates/pages/{$oldalak[$keresett_oldal]['fajl']}.tpl.php")) {
            $keres = $oldalak[$keresett_oldal];
        } else {
            $keres = $hiba_oldal;
        }
    } else {
        $keres = $hiba_oldal;
        header("HTTP/1.0 404 Not Found");
    }

    if(file_exists("./logicals/{$keres['fajl']}.php")) {
        include("./logicals/{$keres['fajl']}.php");
    }

    include('./templates/index.tpl.php'); 
?>