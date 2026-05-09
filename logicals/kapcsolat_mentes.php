<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "foci_adatbazisok";

$uzenet = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nev'], $_POST['email'], $_POST['szoveg'])) {
    
    $nev = trim($_POST['nev']);
    $email = trim($_POST['email']);
    $szoveg = trim($_POST['szoveg']);
    
    if(empty($nev) || empty($email) || empty($szoveg)) {
        $uzenet = "Minden mezőt ki kell tölteni!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $uzenet = "Érvénytelen e-mail cím formátum!";
    } else {
        try {
            $dbh = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sqlInsert = "INSERT INTO uzenetek (nev, email, szoveg) VALUES (:nev, :email, :szoveg)";
            
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(
                ':nev' => $nev, 
                ':email' => $email, 
                ':szoveg' => $szoveg
            ));

            echo "<h3>Köszönjük az üzenetet!</h3>";
            echo "<p>Beküldött adatok:<br>";
            echo "<strong>Név:</strong> " . htmlspecialchars($nev) . "<br>";
            echo "<strong>Email:</strong> " . htmlspecialchars($email) . "<br>";
            echo "<strong>Üzenet:</strong> " . nl2br(htmlspecialchars($szoveg)) . "</p>";
            echo "<a href='kapcsolat'>Vissza az űrlaphoz</a>";
            exit;
            
        } catch (PDOException $e) {

            $uzenet = "Hiba történt a mentés során. Kérjük, próbálja meg később!";
        }
    }
}

if (!empty($uzenet)) {
    echo "<div class='error-msg'>$uzenet</div>";
}
?>