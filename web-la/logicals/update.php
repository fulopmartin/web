<?php
try {
    
    $host = 'mysql.omega';
    $dbname = 'uuser1'; 
    $user = 'uuser1';
    $pass = 'vwAa123456'; 

    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    if (isset($_GET['id'])) {
        $stmt = $pdo->prepare("SELECT * FROM crud_users WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $user_to_edit = $stmt->fetch(PDO::FETCH_ASSOC);
    }

 
    if (isset($_POST['update_save'])) { 
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        $sql = "UPDATE crud_users SET name = ?, email = ?, mobile = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $mobile, $id]);

        header("Location: ./?oldal=tablazat");
        exit();
    }
} catch (PDOException $e) {
    die("Adatbázis hiba: " . $e->getMessage());
}
?>