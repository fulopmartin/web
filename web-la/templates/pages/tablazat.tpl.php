<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>CRUD OPERATIONS</h2>
        <a href="?oldal=create" class="btn btn-primary">Add User</a>
    </div>
    
    <table class="table table-bordered table-striped shadow-sm bg-white">
        <thead class="table-light">
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th style="width: 160px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($users) && count($users) > 0): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><strong><?= htmlspecialchars($user['name']) ?></strong></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['mobile']) ?></td>
                        <td>
                            <a href="?oldal=update&id=<?= $user['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="?oldal=delete&id=<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Biztosan törlöd?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">Nincs adat a táblában.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>