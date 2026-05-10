<section class="result-page">
    <h2>Üzenet küldése</h2>

    <?php if (isset($siker) && $siker): ?>
        <div class="success-box">
            <h3>Köszönjük megkeresését!</h3>
            <p>Az alábbi adatokat rögzítettük:</p>
            <ul class="result-list">
                <li><strong>Név:</strong> <?= htmlspecialchars($nev) ?></li>
                <li><strong>E-mail:</strong> <?= htmlspecialchars($email) ?></li>
                <li><strong>Üzenet:</strong> <?= nl2br(htmlspecialchars($szoveg)) ?></li>
            </ul>
            <a href="index.php" class="btn-back">Vissza a főoldalra</a>
        </div>
    <?php else: ?>
        <div class="error-box">
            <h3>Hiba történt!</h3>
            <ul>
                <?php foreach($hibak as $hiba): ?>
                    <li><?= $hiba ?></li>
                <?php endforeach; ?>
            </ul>
            <a href="javascript:history.back()" class="btn-back">Vissza az űrlaphoz</a>
        </div>
    <?php endif; ?>
</section>

<style>
    .success-box { background: #d4edda; color: #155724; padding: 20px; border-radius: 8px; }
    .error-box { background: #f8d7da; color: #721c24; padding: 20px; border-radius: 8px; }
    .result-list { list-style: none; padding: 20px 0; border-top: 1px solid #ccc; margin-top: 15px; }
    .result-list li { margin-bottom: 10px; }
    .btn-back { display: inline-block; margin-top: 20px; color: #333; font-weight: bold; }
</style>