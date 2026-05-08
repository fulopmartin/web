<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $ablakcim['cim'] ?></title>
    <link rel="stylesheet" href="./styles/stilus.css" type="text/css">
</head>
<body>
    <header class="main-header">
        <div class="container header-content">
            <div class="brand">
                <img src="./images/<?= $fejlec['kepforras'] ?>" alt="<?= $fejlec['kepalt'] ?>" class="logo">
                <div class="title-group">
                    <h1><?= $fejlec['cim'] ?></h1>
                    <?php if($fejlec['motto']): ?><p class="motto"><?= $fejlec['motto'] ?></p><?php endif; ?>
                </div>
            </div>
            
            <div class="user-info">
                <?php if(isset($_SESSION['login'])): ?>
                    Bejelentkezett: <strong><?= $_SESSION['csn']." ".$_SESSION['un'] ?> (<?= $_SESSION['login'] ?>)</strong>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <nav class="main-nav">
        <div class="container">
            <ul class="nav-list">
                <?php foreach ($oldalak as $url => $oldal): ?>
                    <?php if((!isset($_SESSION['login']) && $oldal['menun'][0]) || (isset($_SESSION['login']) && $oldal['menun'][1])): ?>
                        <?php if($oldal['szoveg']): ?>
                        <li<?= (($oldal == $keres) ? ' class="active"' : '') ?>>
                            <a href="<?= ($url == '/') ? '.' : "index.php?oldal=$url" ?>">
                                <?= $oldal['szoveg'] ?>
                            </a>
                        </li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>

    <main class="container">
        <section class="content-card">
            <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
        </section>
    </main>

    <footer class="main-footer">
        <div class="container footer-flex">
            <span><?= $lablec['copyright'] ?></span>
            <strong><?= $lablec['ceg'] ?></strong>
        </div>
    </footer>
</body>
</html>