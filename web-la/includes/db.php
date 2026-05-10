<?php
try {
    $host = 'mysql.omega';
    $dbname = 'uuser1';
    $user = 'uuser1';
    $pass = 'vwAa123456';

    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $dbh = $pdo; 
    
} catch (PDOException $e) {
    die("Hiba: " . $e->getMessage());
}
?>