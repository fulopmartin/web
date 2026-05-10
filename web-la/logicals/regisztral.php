<?php

if (isset($_POST['csaladi_nev']) && isset($_POST['uto_nev']) && 
    isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
    
    try {
       $host = 'mysql.omega';
        $dbname = 'uuser1'; 
        $user = 'uuser1';
        $pass = 'vwAa123456'; 

        $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        $sqlSelect = "SELECT id FROM felhasznalo WHERE bejelentkezes = :login";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':login' => $_POST['felhasznalo']));
        
        if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $hiba = "A felhasználói név már foglalt! Kérjük, válasszon másikat.";
        } else {
            $sqlInsert = "INSERT INTO felhasznalo (csaladi_nev, uto_nev, bejelentkezes, jelszo) 
                          VALUES (:csnev, :unev, :login, :jelszo)";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(
                ':csnev' => $_POST['csaladi_nev'],
                ':unev'  => $_POST['uto_nev'],
                ':login' => $_POST['felhasznalo'],
                ':jelszo' => sha1($_POST['jelszo']) 
            ));
            
            $siker = "Sikeres regisztráció! Most már bejelentkezhet.";
        }
    } catch (PDOException $e) {
        $hiba = "Hiba történt a regisztráció során: " . $e->getMessage();
    }
}
?>