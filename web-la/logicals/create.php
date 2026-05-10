<?php
if (isset($_POST['save_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    try {
       
        $host = 'mysql.omega';
        $dbname = 'uuser1'; 
        $user = 'uuser1';
        $pass = 'vwAa123456'; 

        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      

        $sql = "INSERT INTO crud_users (name, email, mobile) VALUES (:name, :email, :mobile)";
        $stmt = $pdo->prepare($sql);
        
        $siker = $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':mobile' => $mobile
        ]);

        if ($siker) {
            header("Location: ?oldal=tablazat");
            exit();
        }
    } catch (PDOException $e) {
        die("Adatbázis hiba: " . $e->getMessage());
    }
}
?>