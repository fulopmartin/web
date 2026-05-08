<?php
if (isset($_POST['kuld']) && isset($_SESSION['login'])) {
    $uzenet = "";
    $fajl = $_FILES['fajl'];

    if ($fajl['error'] != 0) {
        $uzenet = "Hiba történt a feltöltés során!";
    } elseif (!in_array($fajl['type'], array('image/jpeg', 'image/png'))) {
        $uzenet = "Csak JPG vagy PNG formátum tölthető fel!";
    } elseif ($fajl['size'] > 500*1024) {
        $uzenet = "A fájl túl nagy (max. 500 KB)!";
    } else {
        $cel = "./kepek/" . time() . "_" . $fajl['name'];
        
        if (move_uploaded_file($fajl['tmp_name'], $cel)) {
            $uzenet = "Sikeres feltöltés: " . $fajl['name'];
            header("Refresh:2");
        } else {
            $uzenet = "Sikertelen mentés!";
        }
    }
}
?>