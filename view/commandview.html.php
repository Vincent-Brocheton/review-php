<!doctype html>
<html lang="fr">
<?php require "head.html.php" ?>

<body>
<?php require "navbar.html.php" ?>
<div class="container">
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>nombre de masque commandé</th>
                <th>Date de la commande</th>
                <th>Acceptation</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($commands as $command): ?>
                <tr>
                    <td><?=$command->id?></td>
                    <td><?=$command->nb_masque?></td>
                    <td><?=$command->date_command?></td>
                    <td><?=$command->isAccepted? "Acceptée" : "En Attente" ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
<?php require "script.html.php" ?>

</html>