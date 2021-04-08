<!doctype html>
<html lang="fr">
<?php require "head.html.php" ?>

<body>
    <?php require "navbar.html.php" ?>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Adresse</th>
      <th scope="col">Téléphone</th>
      <th scope="col">Email</th>
      <th scope="col">Nombre de personne</th>
      <th scope="col">Voir les commandes</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($users as $user): ?>
    <tr>
      <td><?= $user->last_name ?></td>
      <td><?= $user->first_name?></td>
      <td><?=$user->adresse?></td>
      <td><?=$user->phone?></td>
      <td><?=$user->mail?></td>
      <td><?=$user->nb_member?></td>
      <td><a href="<?= $path ?>/user/<?= $user->id?>" class="btn btn-primary">Voir les commandes</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</body>
<?php require "script.html.php" ?>

</html>