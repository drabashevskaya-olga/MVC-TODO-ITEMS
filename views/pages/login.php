<?php require 'views/layouts/top.php' ?>
<h1 class="w-auto mb-2">Sign in</h1>
<?php require 'views/layouts/sidebar.php' ?>
<form action="/login/signUp" method="POST" class="w-auto my-2" data-form-type="login">
    <?php if (isset($message)): ?>
        <div class="alert alert-success" role="alert">
            <?= $message ?>
        </div>
    <?php endif; ?>
    <h2 class="h3 mb-3 fw-normal">Please sign in</h2>
    <div class="form-floating">
        <input name="login" type="text" class="form-control" id="floatingLogin" placeholder="name" required>
        <label for="floatingLogin">Login</label>
    </div>
    <div class="form-floating my-2">
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" data-form-type="password" required>
        <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary my-2" type="submit" data-dashlane-label="true"  data-form-type="action,login">Sign in</button>
</form>
<?php require 'views/layouts/bottom.php' ?>