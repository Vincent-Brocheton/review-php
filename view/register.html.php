<!doctype html>
<html lang="fr">
<?php require "head.html.php" ?>

<body>
    <?php require "navbar.html.php" ?>

    <form action="<?= $path ?>/insertUser" method="POST">
        <fieldset class="border offset-3 col-6 my-2">
            <legend>Créez votre compte</legend>
            <div class="form-group">
                <label for="last_name"> Nom : </label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>
            <div class="form-group">
                <label for="first_name"> Prénom : </label>
                <input type="text" class="form-control" id="first_name" name="first_name">
            </div>
            <div class="form-group">
                <label for="adresse"> Adresse : </label>
                <input type="text" class="form-control" id="adresse" name="adresse">
            </div>
            <div class="form-group">
                <label for="phone"> Téléphone : </label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="mail"> E-Mail : </label>
                <input type="email" class="form-control" id="mail" name="mail">
            </div>
            <div class="form-group">
                <label for="password"> Mot de passe : </label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="nb_member"> Nombre de personne dans le foyer : </label>
                <input type="text" class="form-control" id="nb_member" name="nb_member">
            </div>
            <button class="btn btn-primary mb-2">Valider</button>
        </fieldset>
    </form>
</body>
<?php require "script.html.php" ?>

</html>