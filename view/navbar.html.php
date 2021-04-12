<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="?page=welcome">MairyMasker</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= $path ?>/home">Accueil</a>
            </li>
                <?php if(isset($_SESSION['user']) && $_SESSION['user']->role === "USER_ROLE"): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= $path ?>/command">Commander vos masques</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= $path ?>/command/view">Voir vos commandes</a>
            </li>
            <?php endif ?>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']->role === "ROLE_ADMIN"): ?>
                <li class="nav-item">
                <a class="nav-link" href="<?= $path ?>/users">Voir les utilisateurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= $path ?>/command/wait">Voir les demandes en attente</a>
            </li>
            <?php endif ?>
        </ul>
        <?php if(isset($_SESSION['user'])): ?>
        <a href="<?= $path ?>/logout" class="btn btn-danger mr-2">Deconnexion</a>
        <?php elseif(!isset($_SESSION['user'])) :?>
        <a href="<?= $path ?>/login" class="btn btn-primary mr-2">Login</a>
        <a href="<?= $path ?>/register" class="btn btn-warning">Vous inscrire</a>
        <?php endif; ?>
    </div>
</nav>