<!doctype html>
<html lang="fr">
<?php require "head.html.php" ?>

<body>
<?php require "navbar.html.php" ?>
<form action="<?= $path ?>/connect" method="POST">
    <fieldset class="offset-3 col-6 my-2">
        <legend>Connectez-vous</legend>
    <div class="form-group">
        <label for="email">Email : </label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="centrage">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>

    </fieldset>
</form>

</body>
<?php require "script.html.php" ?>

</html>