<!doctype html>
<html lang="fr">
<?php require "head.html.php" ?>

<body>
<?php require "navbar.html.php" ?>

<h2 class="text-center">Commande de masque</h2>
<div class="alert alert-primary offset-3 col-6 text-center " role="alert">
<?php if($lastCommand):?>
<?php if($lastCommand->isAccepted == true): ?>
    Êtes vous sûre de vouloir passer une commande de masque pour votre foyer?
    <div class="autour mt-3">
        <a class="btn btn-danger" href="?page=account">Annuler</a>
        <a class="btn btn-success" href="?page=makeCommand">Valider</a>
    </div>
    <?php else: ?>
        <div class="autour mt-3">
        <div>Vous ne pouvez pas passez commande. Votre dernière commande est en attente.</div>
    </div>
    <?php endif; ?>
    <?php else: ?>
        Êtes vous sûre de vouloir passer une commande de masque pour votre foyer?
    <div class="autour mt-3">
        <a class="btn btn-danger" href="?page=account">Annuler</a>
        <a class="btn btn-success" href="?page=makeCommand">Valider</a>
    </div>
    <?php endif; ?>
</div>

</body>
<?php require "script.html.php" ?>

</html>