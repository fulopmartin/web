<section class="contact-page">
    <h2>Kapcsolat</h2>
    
    <div class="contact-layout">
        <div class="contact-form-box">
            <h3>Küldjön nekünk üzenetet!</h3>
            <form id="contactForm" action="index.php?oldal=kapcsolat_mentes" method="post" novalidate>
                <div class="input-group">
                    <label for="nev">Név:</label>
                    <input type="text" id="nev" name="nev">
                    <span id="err_nev" class="error-msg"></span>
                </div>

                <div class="input-group">
                    <label for="email">E-mail cím:</label>
                    <input type="text" id="email" name="email">
                    <span id="err_email" class="error-msg"></span>
                </div>

                <div class="input-group">
                    <label for="szoveg">Üzenet:</label>
                    <textarea id="szoveg" name="szoveg" rows="5"></textarea>
                    <span id="err_szoveg" class="error-msg"></span>
                </div>

                <button type="submit" class="btn-send">Üzenet küldése</button>
            </form>
        </div>

        <div class="visual-guide-box">
             <h3>Itt talál meg minket</h3>
             <div class="visual-guide">
                <img src="./images/epulet.jpg" alt="Ezt keresse" class="guide-img">
                <div class="guide-label">EZT KERESSE!</div>
            </div>
            <div class="google-map" style="margin-top:20px;">
                <iframe src="http://googleusercontent.com/maps.google.com/5" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('contactForm').onsubmit = function(e) {
    let valid = true;
 
    document.querySelectorAll('.error-msg').forEach(el => el.innerText = '');

    const nev = document.getElementById('nev').value.trim();
    if (nev.length < 3) {
        document.getElementById('err_nev').innerText = 'A név túl rövid (min. 3 karakter)!';
        valid = false;
    }

    const email = document.getElementById('email').value.trim();
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!re.test(email)) {
        document.getElementById('err_email').innerText = 'Érvénytelen e-mail formátum!';
        valid = false;
    }

    const szoveg = document.getElementById('szoveg').value.trim();
    if (szoveg.length < 10) {
        document.getElementById('err_szoveg').innerText = 'Az üzenet túl rövid (min. 10 karakter)!';
        valid = false;
    }

    if (!valid) {
        e.preventDefault();
    }
};
</script>

<style>
    .input-group { margin-bottom: 15px; }
    .input-group label { display: block; margin-bottom: 5px; font-weight: bold; }
    .input-group input, .input-group textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; }
    .error-msg { color: #e74c3c; font-size: 0.85rem; font-weight: bold; display: block; margin-top: 3px; }
    .btn-send { background: var(--foci-zold); color: white; border: none; padding: 12px 25px; border-radius: 5px; cursor: pointer; width: 100%; font-weight: bold; }
</style>