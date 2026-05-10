<?php
$bejelentkezve = isset($_SESSION['login']);
$kepek_mappa = './kepek/';


try {
    $host = 'mysql.omega';
    $dbname = 'uuser1'; 
    $user = 'uuser1';
    $pass = 'vwAa123456'; 

    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Adatbázis hiba: " . $e->getMessage());
}


if ($bejelentkezve && isset($_FILES['uj_kep']) && $_FILES['uj_kep']['error'] == 0) {
    $kiterjesztes = strtolower(pathinfo($_FILES['uj_kep']['name'], PATHINFO_EXTENSION));
    $engedelyezett = array('jpg', 'jpeg', 'png');

    if (in_array($kiterjesztes, $engedelyezett)) {
        $uj_nev = time() . '_' . $_FILES['uj_kep']['name'];
        $cel = $kepek_mappa . $uj_nev;

        if (move_uploaded_file($_FILES['uj_kep']['tmp_name'], $cel)) {
            $sql = "INSERT INTO kepek (fajlnev) VALUES (:fajlnev)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':fajlnev' => $uj_nev]);
            $siker = "A kép sikeresen feltöltve!";
        } else {
            $hiba = "Hiba történt a fájl mozgatásakor.";
        }
    } else {
        $hiba = "Csak JPG és PNG fájlok engedélyezettek!";
    }
}

try {
    $sql = "SELECT * FROM kepek ORDER BY datum DESC";
    $stmt = $pdo->query($sql);
    $galeria = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $hiba = "Adatbázis hiba: " . $e->getMessage();
}
?>