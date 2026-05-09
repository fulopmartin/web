<section class="gallery-section">
    <h2>Képgaléria</h2>
    <?php if(isset($_SESSION['login'])): ?>
        <div class="upload-card">
            <h3>Új kép feltöltése</h3>
            <form action="index.php?oldal=kepek" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Válasszon képet (JPG, PNG - max. 500KB):</label>
                    <input type="file" name="fajl" id="fajl" required>
                </div>
                <button type="submit" name="kuld" class="btn-feltoltes">Feltöltés</button>
            </form>
            
            <?php if(!empty($uzenet)): ?>
                <p class="status-msg"><?= htmlspecialchars($uzenet) ?></p>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="info-msg">
            <p>Képfeltöltéshez kérjük, jelentkezzen be!</p>
        </div>
    <?php endif; ?>

    <div class="gallery-grid">
        <?php if(!empty($kepek) && count($kepek) > 0): ?>
            <?php foreach($kepek as $kep): ?>
                <div class="gallery-item">
                    <div class="image-container">
                        <a href="images/<?= $kep['fajlnev'] ?>" target="_blank">
                            <img src="images/<?= $kep['fajlnev'] ?>" alt="Feltöltött kép">
                        </a>
                    </div>
                    <div class="image-info">
                        <p class="date"><?= $kep['feltoltes_ideje'] ?></p>
                        <p class="user">Feltöltő: <strong><?= htmlspecialchars($kep['feltolto_login']) ?></strong></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="empty-msg">Még nincsenek feltöltött képek.</p>
        <?php endif; ?>
    </div>
</section>

<style>

    .upload-card {
        border: 2px dashed #2ecc71;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 30px;
        background-color: #f9fffb;
    }

    .btn-feltoltes {
        background-color: #2ecc71;
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
    }


    .gallery-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: flex-start;
    }

    .gallery-item {
        width: 220px;
        border: 1px solid #eee;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        background: #fff;
    }

    .image-container img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        display: block;
    }

    .image-info {
        padding: 10px;
        text-align: center;
        border-top: 1px solid #f0f0f0;
    }

    .image-info .date {
        font-size: 0.85rem;
        color: #666;
        margin: 0;
    }

    .image-info .user {
        font-size: 0.75rem;
        color: #999;
        margin: 5px 0 0 0;
    }
</style>