<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login'])) {
    echo "<div class='container mt-5'><h3>A tartalom megtekintéséhez bejelentkezés szükséges!</h3></div>";
} else {
    try {
       
        $host = 'mysql.omega';
        $dbname = 'uuser1'; 
        $user = 'uuser1';
        $pass = 'vwAa123456'; 

        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT nev, email, szoveg, idopont FROM uzenetek ORDER BY idopont DESC";
        $stmt = $pdo->query($sql);
        $uzenetek = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Hiba történt a lekérdezés során: " . $e->getMessage() . "</div>";
        $uzenetek = [];
    }
}
?>