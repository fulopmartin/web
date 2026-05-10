<div class="container mt-5">
    <h4>Add New User</h4>
    <form action="?oldal=create" method="post" class="card p-4 shadow">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter name" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
        </div>
        <div class="mb-3">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control" placeholder="Enter mobile number" required>
        </div>
        <button type="submit" name="save_user" class="btn btn-primary">Save User</button>
        <a href="?oldal=tablazat" class="btn btn-secondary">Cancel</a>
    </form>
</div>