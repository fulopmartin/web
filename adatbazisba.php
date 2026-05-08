<?php
$fajl = fopen("poszt.txt", "r");
fgets($fajl);

while (($sor = fgets($fajl)) !== false) {
    $adatok = preg_split('/\s+/', trim($sor), 2);
    if (count($adatok) == 2) {
        $stmt = $pdo->prepare("INSERT IGNORE INTO posztok (id, nev) VALUES (?, ?)");
        $stmt->execute([$adatok[0], $adatok[1]]);
    }
}
fclose($fajl);
?>