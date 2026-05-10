<div class="container mt-5">
    <h3>User szerkesztése</h3>
    <form action="?oldal=update" method="post" class="card p-4 shadow">
        <input type="hidden" name="id" value="<?= $user_to_edit['id'] ?>">

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user_to_edit['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user_to_edit['email']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control" value="<?= htmlspecialchars($user_to_edit['mobile']) ?>">
        </div>
        
        <div class="d-flex gap-2">
            <button type="submit" name="update_save" class="btn btn-primary">Változtatások mentése</button>
            <a href="?oldal=tablazat" class="btn btn-secondary">Mégse</a>
        </div>
    </form>
</div>