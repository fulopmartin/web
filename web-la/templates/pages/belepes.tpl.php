<div class="auth-container">
    <?php if(isset($siker) && $siker != ""): ?>
        <div class="alert alert-success" style="color: green; border: 1px solid green; padding: 10px; margin-bottom: 10px;">
            <?= $siker ?>
        </div>
    <?php endif; ?>

    <?php if(isset($hiba) && $hiba != ""): ?>
        <div class="alert alert-danger" style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 10px;">
            <?= $hiba ?>
        </div>
    <?php endif; ?>

    <div class="login-box">
        <h3>Bejelentkezés</h3>
        <form action="index.php?oldal=belep" method="post">
            <input type="text" name="felhasznalo" placeholder="Felhasználónév" required><br>
            <input type="password" name="jelszo" placeholder="Jelszó" required><br>
            <button type="submit">Belépés</button>
        </form>
    </div>

    <hr>

    <div class="register-box">
        <h3>Regisztráció</h3>
        <form action="index.php?oldal=regisztral" method="post">
            <input type="text" name="csaladi_nev" placeholder="Családi név" required><br>
            <input type="text" name="uto_nev" placeholder="Utónév" required><br>
            <input type="text" name="felhasznalo" placeholder="Felhasználónév" required><br>
            <input type="password" name="jelszo" placeholder="Jelszó" required><br>
            <button type="submit">Regisztráció</button>
        </form>
    </div>
</div>