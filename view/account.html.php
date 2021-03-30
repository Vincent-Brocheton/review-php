<!doctype html>
<html lang="fr">
<?php require "head.html.php" ?>

<body>
<?php require "navbar.html.php" ?>

<div class="container offset-3 col-6">
    <div class="row my-4">
    <div class="col-6">Nom : <?= $user->last_name?></div>
    <div class="col-6">Prenom : <?= $user->first_name?></div>
    </div>
    <div class="mb-4">Adresse : <?= $user->adresse?></div>
    <div class="row mb-4">
    <div class="col-6">Téléphone : <?= $user->phone?></div>
    <div class="col-6">Mail : <?= $user->mail?></div>
    </div>
    <div>Nombre de personne dans le foyer : <?= $user->nb_member?></div>
</div>

</body>
<?php require "script.html.php" ?>

</html>