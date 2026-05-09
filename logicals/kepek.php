<?php
$kepek = array();
$uzenet = "";


$db_host = 'localhost';
$db_name = 'foci_adatbazisok';
$db_user = 'root';
$db_pass = '';

try {
    $dbh = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if(isset($_FILES['fajl']) && $_FILES['fajl']['error'] == 0 && isset($_SESSION['login'])) {
        $mappa = 'images/';

        if (!is_dir($mappa)) {
            mkdir($mappa, 0777, true);
        }

        $fajlnev = time().'_'.basename($_FILES['fajl']['name']);
        $cel_fajl = $mappa . $fajlnev;
        
        if(move_uploaded_file($_FILES['fajl']['tmp_name'], $cel_fajl)) {

            $sqlInsert = "INSERT INTO kepek (fajlnev, feltolto_login) VALUES (:fajlnev, :login)";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(
                ':fajlnev' => $fajlnev, 
                ':login'   => $_SESSION['login']
            ));
            $uzenet = "Sikeres feltöltés!";
            

            header("Refresh:1; url=index.php?oldal=kepek");
        } else {
            $uzenet = "Hiba történt a fájl mentésekor.";
        }
    }


    $sqlSelect = "SELECT fajlnev, feltolto_login, feltoltes_ideje FROM kepek ORDER BY feltoltes_ideje DESC";
    $res = $dbh->query($sqlSelect);
    $kepek = $res->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $uzenet = "Hiba: " . $e->getMessage();
}
?>