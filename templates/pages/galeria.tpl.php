<h2>Képgaléria</h2>

<?php if(isset($_SESSION['login'])): ?>
    <div class="upload-form">
        <h4>Új kép feltöltése</h4>
        <form action="index.php?oldal=kepek" method="post" enctype="multipart/form-data">
            <input type="file" name="kepfajl" required>
            <button type="submit" name="kuld">Feltöltés indítása</button>
        </form>
    </div>
<?php else: ?>
    <p><i>Képfeltöltéshez kérjük, jelentkezzen be!</i></p>
<?php endif; ?>

<div class="gallery">
    </div>