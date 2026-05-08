<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? (' | ' . $ablakcim['mottó']) : '' ) ?></title>
    
    
    <link rel="stylesheet" href="./styles/stilus.css" type="text/css">
    
    <?php if(file_exists('./styles/'.$keres['fajl'].'.css')) { ?>
        <link rel="stylesheet" href="./styles/<?= $keres['fajl']?>.css" type="text/css">
    <?php } ?>
</head>
<body>
    <header class="main-header">
        <div class="header-top">
            <div class="logo-section">
                <img src="./images/<?=$fejlec['kepforras']?>" alt="<?=$fejlec['kepalt']?>" class="header-logo">
                <div class="title-group">
                    <h1><?= $fejlec['cim'] ?></h1>
                    <?php if (isset($fejlec['motto'])) { ?><p class="motto"><?= $fejlec['motto'] ?></p><?php } ?>
                </div>
            </div>
            
            <div class="user-info">
                <?php if(isset($_SESSION['login'])) { ?>
                    <div class="status-badge">
                        <span class="dot"></span>
                        Bejelentkezve: <strong><?= $_SESSION['csn']." ".$_SESSION['un'] ?></strong>
                    </div>
                <?php } else { ?>
                    <div class="status-badge guest">Vendég mód</div>
                <?php } ?>
            </div>
        </div>
    </header>

    <div id="wrapper">
        <aside id="nav">
            <nav class="side-nav">
                <div class="nav-title">Menürendszer</div>
                <ul>
                    <?php foreach ($oldalak as $url => $oldal) { ?>
                        <?php if(! isset($_SESSION['login']) && $oldal['menun'][0] || isset($_SESSION['login']) && $oldal['menun'][1]) { ?>
                            <li<?= (($oldal == $keres) ? ' class="active"' : '') ?>>
                                <a href="<?= ($url == '/') ? '.' : $url ?>">
                                    <span class="nav-icon">⚽</span> <?= $oldal['szoveg'] ?>
                                </a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </nav>
        </aside>

        <main id="content">
            <div class="content-card">
                <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
            </div>
        </main>
    </div>

    <footer class="main-footer">
        <div class="footer-content">
            <p>
                <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
                <?php if(isset($lablec['ceg'])) { ?>| <strong><?= $lablec['ceg']; ?></strong><?php } ?>
            </p>
        </div>
    </footer>
</body>
</html>
