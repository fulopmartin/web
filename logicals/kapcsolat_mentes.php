<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "foci_adatbazisok";

$hiba_uzenet = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nev'], $_POST['email'], $_POST['szoveg'])) {
    
    $nev = trim($_POST['nev']);
    $email = trim($_POST['email']);
    $uzenet_torzs = trim($_POST['szoveg']);

    $login = isset($_SESSION['login']) ? $_SESSION['login'] : 'Vendég';

    if (empty($nev) || empty($email) || empty($uzenet_torzs)) {
        $hiba_uzenet = "Minden mezőt ki kell tölteni!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hiba_uzenet = "Érvénytelen e-mail cím!";
    } else {
        try {
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO uzenetek (nev, email, uzenet, felhasznalo_login) 
                    VALUES (:nev, :email, :uzenet, :login)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nev'    => $nev,
                ':email'  => $email,
                ':uzenet' => $uzenet_torzs,
                ':login'  => $login
            ]);

            echo "<h3>Köszönjük az üzenetet!</h3>";
            echo "<p><strong>Név:</strong> " . htmlspecialchars($nev) . "<br>";
            echo "<strong>Login:</strong> " . htmlspecialchars($login) . "<br>";
            echo "<strong>Üzenet:</strong> " . nl2br(htmlspecialchars($uzenet_torzs)) . "</p>";
            echo "<a href='kapcsolat'>Új üzenet küldése</a>";
            exit;

        } catch (PDOException $e) {
            $hiba_uzenet = "Adatbázis hiba: " . $e->getMessage();
        }
    }
}

if (!empty($hiba_uzenet)) {
    echo "<p style='color:red;'>$hiba_uzenet</p>";
}
?>