<!-- Grottes St Antoine - Site de réservation : Header (entête) -->



<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a href="../index.php" class="navbar-brand">Grottes de Saint-Antoine</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <div class="nav-item">
                    <a class="nav-link active" href="../pages/enregistrement.pages.php">Réserver</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link active" href="../pages/gallerie.pages.php">Galerie</a>
                </div>
                <?php if (isset($_SESSION['nom_admin']) and isset($_SESSION['mdp_admin'])) { ?>
                    <div class="nav-item">
                        <?php
                        echo "<a class='nav-link active' href='../pages/pageadmin.pages.php'>Bienvenue ", $_SESSION['nom_admin'], "</a>";
                        ?>
                    </div>
                    <div class="nav-item">
                        <?php
                        echo "<a style='color: white;' class='btn btn-danger' href='../php/admin.deconnexion.php'>Se déconnecter</a>";
                        ?>
                    </div>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>