<?php
    $MAPPA = './images/';
    $TIPUSOK = array ('.jpg', '.png');
    $MEDIATIPUSOK = array('image/jpeg', 'image/png');
    $MAXMERET = 500*1024;

    $kepek = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false) {
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK)) {
                $kepek[$fajl] = filemtime($MAPPA.$fajl);
            }
        }
    }
    closedir($olvaso);
    arsort($kepek);
?>

<section class="gallery-section">
    <h2>Képgaléria</h2>

    <?php if(isset($_SESSION['login'])): ?>
        <div class="upload-card">
            <h3>Új kép feltöltése</h3>
            <form action="index.php?oldal=kepek" method="post" enctype="multipart/form-data">
                <label>Válasszon képet (JPG, PNG - max. 500KB):</label>
                <input type="file" name="fajl" required>
                <button type="submit" name="kuld" class="btn-upload">Feltöltés</button>
            </form>
            
            <?php if(isset($uzenet)) { echo "<p class='status-msg'>$uzenet</p>"; } ?>
        </div>
    <?php else: ?>
        <div class="info-msg">
            <p>Képfeltöltéshez kérjük, <a href="index.php?oldal=belepes">jelentkezzen be</a>!</p>
        </div>
    <?php endif; ?>

    <div class="gallery-grid">
        <?php if(count($kepek) > 0): ?>
            <?php foreach($kepek as $fajl => $datum): ?>
                <div class="gallery-item">
                    <a href="<?= $MAPPA.$fajl ?>" target="_blank">
                        <img src="<?= $MAPPA.$fajl ?>" alt="Galéria kép">
                    </a>
                    <p><?= date("Y-m-d H:i", $datum) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Még nincsenek feltöltött képek.</p>
        <?php endif; ?>
    </div>
</section>