<section class="gallery-page container mt-4">
    <h2>Képgaléria</h2>

    <?php if (isset($_SESSION['login'])): ?>
        <div class="upload-section border p-3 mb-4 bg-light">
            <h4>Új kép feltöltése</h4>
            <form action="?oldal=kepek" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="uj_kep" class="form-label">Válasszon képet (JPG, PNG):</label>
                    <input type="file" name="uj_kep" id="uj_kep" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Feltöltés</button>
            </form>
            <?php if (isset($siker)) echo "<p class='text-success mt-2'>$siker</p>"; ?>
            <?php if (isset($hiba)) echo "<p class='text-danger mt-2'>$hiba</p>"; ?>
        </div>
    <?php endif; ?>

    <hr>

    <div class="row">
        <?php if (isset($galeria) && count($galeria) > 0): ?>
            <?php foreach ($galeria as $kep): ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="./kepek/<?= htmlspecialchars($kep['fajlnev']) ?>" class="card-img-top" alt="Galéria kép">
                        <div class="card-footer small text-muted">
                            <?= $kep['datum'] ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="alert alert-info">Még nincsenek feltöltött képek.</p>
            </div>
        <?php endif; ?>
    </div>
</section>