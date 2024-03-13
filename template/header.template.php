<!-- Grottes St Antoine - Site de réservation : Header (entête) -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">Grottes de Saint-Antoine</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <div class="nav-item">
                    <a class="nav-link active" href="../pages/resa_debut.pages.php">Réserver</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link active" href="../pages/gallerie.pages.php">Galerie</a>
                </div>
                <?php if (isset($_SESSION['nom_admin']) and isset($_SESSION['mdp_admin'])) { ?>
                    <div class="nav-item">
                        <?php
                        echo "<a style='color: blue;' class='nav-link active' href='../pages/pageadmin.pages.php'>Bienvenue ", $_SESSION['nom_admin'], "</a>";
                        ?>
                    </div>
                    <div class="nav-item">
                        <?php
                        echo "<a class='nav-link active' href='../pages/dashboard.pages.php'>Tableau de bord</a>";
                        ?>
                    </div>
                    <div class="nav-item">
                        <?php
                        echo "<a class='nav-link active' href='../pages/categories.pages.php'>Catégories</a>";
                        ?>
                    </div>
                    <div class="nav-item">
                        <?php
                        echo "<a class='nav-link active' href='../pages/clientele.pages.php'>Clients</a>";
                        ?>
                    </div>
                    <div class="nav-item">
                        <?php
                        echo "<a class='nav-link active' href='../pages/chambres.pages.php'>Chambres</a>";
                        ?>
                    </div>
                    <div class="nav-item">
                        <?php
                        echo "<a class='nav-link active' href='../pages/tarifs.pages.php'>Tarifs</a>";
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