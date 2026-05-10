<section id="axios-app">
    <h2>Játékos Keret Kezelése (Axios CRUD)</h2>
    <p>Itt kezelheti a stadion játékosait valós időben.</p>
    
    <div class="crud-controls">
        <input type="text" id="playerName" placeholder="Játékos neve">
        <button class="btn-green" onclick="addPlayer()">Hozzáadás</button>
    </div>

    <table class="styled-table">
        <thead>
            <tr>
                <th>Mez</th>
                <th>Név</th>
                <th>Érték</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody id="playerTable">
            </tbody>
    </table>
</section>

<style>
    .styled-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    .styled-table th { background: #f4f7f6; padding: 12px; text-align: left; }
    .styled-table td { padding: 12px; border-bottom: 1px solid #eee; }
    .btn-green { background: var(--stadium-green); color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer; }
</style>