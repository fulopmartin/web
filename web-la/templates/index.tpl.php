<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$fejlec = $fejlec ?? ['kepforras' => 'logo.png', 'kepalt' => 'Logo', 'cim' => 'Foci weboldal', 'motto' => 'A foci mindenkié!'];
$lablec = $lablec ?? ['copyright' => 'Copyright 2026', 'ceg' => 'Foci weblap KFT'];
$ablakcim = $ablakcim ?? ['cim' => 'Foci oldal'];

if (!isset($keres)) {
    $keres = $oldalak['/'] ?? ['fajl' => 'cimlap'];
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($ablakcim['cim']) ?></title>
    <link rel="stylesheet" href="./styles/stilus.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="main-header">
        <div class="container header-content">
            <div class="brand">
                <img src="./images/<?= htmlspecialchars($fejlec['kepforras']) ?>" alt="<?= htmlspecialchars($fejlec['kepalt']) ?>" class="logo">
                <div class="title-group">
                    <h1><?= htmlspecialchars($fejlec['cim']) ?></h1>
                    <?php if(!empty($fejlec['motto'])): ?>
                        <p class="motto"><?= htmlspecialchars($fejlec['motto']) ?></p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="user-info">
                <?php if(isset($_SESSION['login'])): ?>
                    Bejelentkezett: <strong><?= htmlspecialchars($_SESSION['csn']." ".$_SESSION['un']) ?> (<?= htmlspecialchars($_SESSION['login']) ?>)</strong>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <nav class="main-nav">
        <div class="container">
            <ul class="nav-list">
                <?php foreach ($oldalak as $url => $oldal): ?>
                    <?php 
                    $lathato = false;
                    if (!isset($_SESSION['login']) && isset($oldal['menun'][0]) && $oldal['menun'][0]) $lathato = true;
                    if (isset($_SESSION['login']) && isset($oldal['menun'][1]) && $oldal['menun'][1]) $lathato = true;
                    
                    if ($lathato && !empty($oldal['szoveg'])): ?>
                        <li<?= (($oldal == $keres) ? ' class="active"' : '') ?>>
                            <a href="<?= ($url == '/') ? '.' : "index.php?oldal=$url" ?>">
                                <?= htmlspecialchars($oldal['szoveg']) ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>

    <main class="container">
        <section class="content-card">
            <?php 
                $fajl_utvonal = "./templates/pages/{$keres['fajl']}.tpl.php";
                if (file_exists($fajl_utvonal)) {
                    include($fajl_utvonal);
                } else {
                    echo "<p>Hiba: A tartalom nem található!</p>";
                }
            ?>
        </section>
    </main>

    <footer class="main-footer">
        <div class="container footer-flex">
            <span><?= htmlspecialchars($lablec['copyright']) ?></span>
            <strong><?= htmlspecialchars($lablec['ceg']) ?></strong>
        </div>
    </footer>
</body>
</html>