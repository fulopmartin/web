<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 border-end">
            <h3>Bejelentkezés</h3>
            <form action="?oldal=belep" method="post">
                <input type="text" name="felhasznalo" placeholder="Felhasználónév" class="form-control mb-2" required>
                <input type="password" name="jelszo" placeholder="Jelszó" class="form-control mb-2" required>
                <button type="submit" class="btn btn-primary">Belépés</button>
            </form>
        </div>

        <div class="col-md-6">
            <h3>Regisztráció</h3>
            <form action="?oldal=regisztral" method="post">
                <input type="text" name="csaladi_nev" placeholder="Családi név" class="form-control mb-2" required>
                <input type="text" name="uto_nev" placeholder="Utónév" class="form-control mb-2" required>
                <input type="text" name="felhasznalo" placeholder="Felhasználónév" class="form-control mb-2" required>
                <input type="password" name="jelszo" placeholder="Jelszó" class="form-control mb-2" required>
                <button type="submit" class="btn btn-success">Regisztráció</button>
            </form>
            <?php if(isset($siker)) echo "<div class='alert alert-success mt-2'>$siker</div>"; ?>
            <?php if(isset($hiba)) echo "<div class='alert alert-danger mt-2'>$hiba</div>"; ?>
        </div>
    </div>
</div>