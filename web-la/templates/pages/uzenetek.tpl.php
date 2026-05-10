<?php
?>

<section class="messages-page">
    <h2>Beérkezett üzenetek</h2>
    
    <?php if (!isset($_SESSION['login'])): ?>
        <div class="alert alert-warning">A tartalom megtekintéséhez bejelentkezés szükséges!</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="message-table">
                <thead>
                    <tr>
                        <th>Küldés ideje</th>
                        <th>Név</th>
                        <th>E-mail</th>
                        <th>Üzenet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($uzenetek) && count($uzenetek) > 0): ?>
                        <?php foreach ($uzenetek as $u): ?>
                            <tr>
                                <td><?= htmlspecialchars($u['idopont']) ?></td>
                                <td>
                                    <?php 
                                        echo (!empty($u['nev'])) ? htmlspecialchars($u['nev']) : "<em>Vendég</em>"; 
                                    ?>
                                </td>
                                <td><?= htmlspecialchars($u['email']) ?></td>
                                <td class="msg-text"><?= nl2br(htmlspecialchars($u['szoveg'])) ?></td>
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
    <?php endif; ?>
</section>

<style>
    .messages-page { padding: 20px; }
    .table-responsive { overflow-x: auto; margin-top: 20px; }
    
    .message-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .message-table th, .message-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .message-table th {
        background-color: #2ecc71;
        color: white;
        text-transform: uppercase;
        font-size: 0.9rem;
    }

    .message-table tr:hover { background-color: #f5f5f5; }
    .msg-text { font-style: italic; color: #555; font-size: 0.9rem; }

    @media (max-width: 600px) {
        .message-table th, .message-table td { font-size: 0.8rem; padding: 8px; }
    }
</style>