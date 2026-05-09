<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login'])) {
    echo "<h3>A tartalom megtekintéséhez bejelentkezés szükséges!</h3>";
} else {
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "foci_adatbazisok";

    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT nev, email, uzenet, kuldes_ideje, felhasznalo_login 
                FROM uzenetek 
                ORDER BY kuldes_ideje DESC";
        $stmt = $pdo->query($sql);
        $uzenetek = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        die("Hiba történt: " . $e->getMessage());
    }
?>

<section class="messages-page">
    <h2>Beérkezett üzenetek</h2>
    
    <div class="table-responsive">
        <table class="message-table">
            <thead>
                <tr>
                    <th>Időpont</th>
                    <th>Név (Login)</th>
                    <th>E-mail</th>
                    <th>Üzenet</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($uzenetek) > 0): ?>
                    <?php foreach ($uzenetek as $u): ?>
                        <tr>
                            <td><?= $u['kuldes_ideje'] ?></td>
                            <td>
                                <strong><?= htmlspecialchars($u['nev']) ?></strong><br>
                                <small>(<?= htmlspecialchars($u['felhasznalo_login']) ?>)</small>
                            </td>
                            <td><?= htmlspecialchars($u['email']) ?></td>
                            <td class="msg-text"><?= nl2br(htmlspecialchars($u['uzenet'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Még nem érkezett üzenet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<style>
    .message-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    .message-table th, .message-table td { border: 1px solid #ddd; padding: 10px; text-align: left; }
    .message-table th { background-color: #2ecc71; color: white; }
    .msg-text { font-style: italic; color: #333; }
    .table-responsive { overflow-x: auto; }
</style>

<?php } ?>