<?php require 'views/layouts/top.php' ?>
<h1 class="w-auto">Add new task in TO-DO List</h1>
<?php require 'views/layouts/sidebar.php' ?>
<form action="/add/new" method="post" class="w-auto my-2">
    <?php if ($message): ?>
        <div class="alert alert-success" role="alert">
            Did you add new TO_DO Item!
        </div>
    <?php endif; ?>
    <div class="form-floating my-2">
        <input type="text" class="form-control" name="taskUser" id="floatingUserName" placeholder="User name" data-form-type="name" required>
        <label for="floatingUserName">User name</label>
    </div>
    <div class="form-floating my-2">
        <input type="email" class="form-control" name="taskEmail" id="floatingEmail" placeholder="name@example.com" required>
        <label for="floatingEmail">Email</label>
    </div>
    <div class="form-floating my-2">
        <textarea class="form-control" name="taskText" id="floatingText" placeholder="..." rows="3" required></textarea>
        <label for="floatingText">Text</label>
    </div>
    <input type="submit" class="w-100 btn btn-outline-primary btn-lg my-2" value="Add new task">
</form>
<?php require 'views/layouts/bottom.php' ?>