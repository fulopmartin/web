<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
    try {
       $host = 'mysql.omega';
        $dbname = 'uuser1'; 
        $user = 'uuser1';
        $pass = 'vwAa123456'; 

        $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
    
        $sqlSelect = "select id, csaladi_nev, uto_nev from felhasznalo where bejelentkezes = :bejelentkezes and jelszo = sha1(:jelszo)";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo'], ':jelszo' => $_POST['jelszo']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        
        if($row) {
            $_SESSION['csn'] = $row['csaladi_nev']; 
            $_SESSION['un'] = $row['uto_nev'];
            $_SESSION['login'] = $_POST['felhasznalo'];
            
            header("Location: .");
            exit(); 
        } else {
            $errormessage = "Hibás felhasználónév vagy jelszó!";
        }
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
    }      
}
else {
    header("Location: .");
    exit();
}
?>