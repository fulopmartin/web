<div class="auth-container">
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
            <input type="text" name="vezeteknev" placeholder="Családi név" required><br>
            <input type="text" name="utonev" placeholder="Utónév" required><br>
            <input type="text" name="felhasznalo" placeholder="Felhasználónév" required><br>
            <input type="password" name="jelszo" placeholder="Jelszó" required><br>
            <button type="submit">Regisztráció</button>
        </form>
    </div>
</div>