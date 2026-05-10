<?php
$users = [];
try {
    
    $host = 'mysql.omega'; 
    $dbname = 'uuser1'; 
    $user = 'uuser1';
    $pass = 'vwAa123456'; 

    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $stmt = $pdo->query("SELECT * FROM crud_users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $hiba = "Hiba az adatok lekérésekor: " . $e->getMessage();
}
?>