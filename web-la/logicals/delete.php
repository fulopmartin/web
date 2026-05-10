<?php
if (isset($_GET['id'])) {
    try {
        $host = 'mysql.omega';
        $dbname = 'uuser1'; 
        $user = 'uuser1';
        $pass = 'vwAa123456'; 

        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = intval($_GET['id']);
        $stmt = $pdo->prepare("DELETE FROM crud_users WHERE id = ?");
        $stmt->execute([$id]);

    } catch (PDOException $e) {
        die("Hiba a törlés során: " . $e->getMessage());
    }
}

header("Location: ./?oldal=tablazat");
exit();
?>