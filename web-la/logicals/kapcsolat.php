<?php
$hiba_uzenet = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nev'], $_POST['email'], $_POST['szoveg'])) {
    
    $nev = trim($_POST['nev']);
    $email = trim($_POST['email']);
    $uzenet_torzs = trim($_POST['szoveg']);

    $login = isset($_SESSION['login']) ? $_SESSION['login'] : 'Vendég';
    $nev_menteshez = isset($_SESSION['login']) ? $nev : 'Vendég';

    if (empty($nev) || empty($email) || empty($uzenet_torzs)) {
        $hiba_uzenet = "Minden mezőt ki kell tölteni!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hiba_uzenet = "Érvénytelen e-mail cím!";
    } else {
        
        try {
            
            $host = 'mysql.omega';
            $dbname = 'uuser1'; 
            $user = 'uuser1';
            $pass = 'vwAa123456'; 

            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            

            $sql = "INSERT INTO uzenetek (nev, email, szoveg) VALUES (:nev, :email, :szoveg)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nev'    => $nev_menteshez, 
                ':email'  => $email,
                ':szoveg' => $uzenet_torzs
            ]);

            echo "<div class='container mt-5'>";
            echo "<h3>Köszönjük az üzenetet!</h3>";
            echo "<p><strong>Név:</strong> " . htmlspecialchars($nev) . "<br>";
            echo "<strong>Feladó (e-mail):</strong> " . htmlspecialchars($email) . "<br>";
            echo "<strong>Üzenet:</strong> " . nl2br(htmlspecialchars($uzenet_torzs)) . "</p>";
            echo "<a href='?oldal=kapcsolat' class='btn btn-primary'>Új üzenet küldése</a>";
            echo "</div>";
            exit; 

        } catch (PDOException $e) {
            $hiba_uzenet = "Adatbázis hiba: " . $e->getMessage();
        }
    }
}

if (!empty($hiba_uzenet)) {
    echo "<div class='alert alert-danger'>$hiba_uzenet</div>";
}
?>