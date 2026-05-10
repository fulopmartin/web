<h2>Kapcsolat</h2>
<p>Küldjön nekünk üzenetet az alábbi űrlap segítségével!</p>

<form id="kapcsolat-form" action="?oldal=kapcsolat" method="post">
    <div class="form-group">
        <input type="text" name="nev" id="nev" placeholder="Az Ön neve">
        <div id="nev-error" class="error-msg"></div>
    </div>

    <div class="form-group">
        <input type="text" name="email" id="email" placeholder="E-mail címe">
        <div id="email-error" class="error-msg"></div>
    </div>

    <div class="form-group">
        <textarea name="szoveg" id="szoveg" placeholder="Üzenet szövege" rows="5"></textarea>
        <div id="szoveg-error" class="error-msg"></div>
    </div>

    <input type="submit" value="Üzenet küldése">
</form>

<style>
    .error-msg { color: red; font-size: 0.85rem; margin-bottom: 10px; min-height: 1.2rem; }
    .form-group { margin-bottom: 5px; }
    input[type="text"], textarea { width: 100%; padding: 8px; margin-bottom: 5px; }
</style>

<script>
document.getElementById('kapcsolat-form').onsubmit = function() {
    let valid = true;
    const nev = document.getElementById('nev').value.trim();
    const email = document.getElementById('email').value.trim();
    const szoveg = document.getElementById('szoveg').value.trim();

    document.querySelectorAll('.error-msg').forEach(el => el.innerText = '');

    if(nev.length < 3) {
        document.getElementById('nev-error').innerText = "A név túl rövid (min. 3 karakter)!";
        valid = false;
    }

    const emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailRe.test(email)) {
        document.getElementById('email-error').innerText = "Kérjük, érvényes e-mail címet adjon meg!";
        valid = false;
    }
    
    if(szoveg.length < 10) {
        document.getElementById('szoveg-error').innerText = "Az üzenet túl rövid (min. 10 karakter)!";
        valid = false;
    }
    
    return valid;
};
</script>