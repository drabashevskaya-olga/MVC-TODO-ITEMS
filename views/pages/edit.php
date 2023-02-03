<?php require 'views/layouts/top.php' ?>
<h1 class="w-auto"><?= $title ?></h1>
<?php require 'views/layouts/sidebar.php' ?>
<form action="/item/save" method="post" class="w-auto my-2">
    <div class="form-floating my-2">
        <input type="text" class="form-control" name="taskUser" id="floatingUserName" value="<?= isset($toDoItem->userName) ? $toDoItem->userName : '' ?>" disabled>
        <label for="floatingUserName">User name</label>
    </div>
    <div class="form-floating my-2">
        <input type="email" class="form-control" name="taskEmail" id="floatingEmail" value="<?= isset($toDoItem->email) ? $toDoItem->email : '' ?>" disabled>
        <label for="floatingEmail">Email</label>
    </div>
    <div class="form-floating my-2">
        <textarea class="form-control" name="taskText" id="floatingText" rows="3">
            <?= isset($toDoItem->text) ? $toDoItem->text : '' ?>
        </textarea>
        <label for="floatingText">Text</label>
    </div>
    <input type="hidden" name="taskID" value="<?= isset($toDoItem->id) ? $toDoItem->id : '' ?>">
    <input type="submit" class="w-100 btn btn-outline-primary btn-lg my-2" value="Save">
</form>
<?php require 'views/layouts/bottom.php' ?>