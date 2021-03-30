<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="?page=welcome">MairyMasker</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="?page=welcome">Accueil</a>
            </li>
                <?php if(isset($_SESSION['user'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="?page=command">Commander vos masques</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=viewCommand">Voir vos commandes</a>
            </li>
            <?php endif ?>
        </ul>
        <?php if(isset($_SESSION['user'])): ?>
        <a href="?page=logout" class="btn btn-danger mr-2">Deconnexion</a>
        <?php elseif(!isset($_SESSION['user'])) :?>
        <a href="?page=login" class="btn btn-primary mr-2">Login</a>
        <a href="?page=register" class="btn btn-warning">Vous inscrire</a>
        <?php endif; ?>
    </div>
</nav>