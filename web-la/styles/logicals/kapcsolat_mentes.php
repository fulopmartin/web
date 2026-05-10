<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "foci_adatbazisok";

$hibak = array();
$adatok = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nev = trim($_POST['nev']);
    $email = trim($_POST['email']);
    $szoveg = trim($_POST['szoveg']);

    if (empty($nev) || strlen($nev) < 3) $hibak[] = "Érvénytelen név!";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $hibak[] = "Érvénytelen e-mail cím!";
    if (empty($szoveg) || strlen($szoveg) < 10) $hibak[] = "Az üzenet túl rövid!";

    if (empty($hibak)) {
        try {
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
            $stmt = $pdo->prepare("INSERT INTO uzenetek (nev, email, szoveg, datum) VALUES (?, ?, ?, NOW())");
            $stmt->execute([$nev, $email, $szoveg]);
            $siker = true;
        } catch (PDOException $e) {
            $hibak[] = "Adatbázis hiba történt!";
        }
    }
}
?>