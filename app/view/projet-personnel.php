<?php
// démarrer une session PHP
session_start();
?>

<main id="mainProjetPersonnel">

    <section id="ProjetPersonnel" class="titleSection">
        <div class="positionTitleSection">
            <h3>Projets Personnels</h3>
            <p>Voici quelques projets personnels</p>
        </div>
    </section>

    <section class="containerCarouselProjetPersonnel">

        <!-- si l'utilisateur est un administrateur, afficher la section d'ajout de projet -->
        <?php if (isset($_SESSION['id_admin'])) : ?>
            <section id="add-project" class="admin-only">
                <div id="containerBtnAddProject">
                    <div class="cercleBtnAddProject" title="ajouter un projet">
                        <div class="containerImgBtnAddProject">
                            <img id="plus" src="img/logo-n/plus-n.png" alt="">
                        </div>
                    </div>
                </div>
            </section>
            <!-- inclusion des fichiers pour les modales d'ajout et de mise à jour des projets -->
            <?php require '../app/view/modal.php'; ?>
            <?php require '../app/view/modal-update.php'; ?>
        <?php endif; ?>
        <!-- Inclusion du fichier project qui permet de trier les projets par ordre décroissant -->
        <?php require '../app/model/project.php'; ?>
        <!-- Boucle à travers chaque projet récupéré -->
        <?php foreach ($project as $newProject) { ?>
            <section class="project">
                <div class="containerProjectIcon">
                    <!-- si l'utilisateur est un administrateur, afficher les icônes de suppression et de modification -->
                    <?php if (isset($_SESSION['id_admin'])) : ?>
                        <div class="projectIcon">
                            <a href="../app/model/delete.php?id_projets_personnels=<?php echo $newProject["id_projets_personnels"] ?>"><img class="projectIconTrash" src="img/logo-n/trash-n.png" alt="" title="supprimer"></a>
                        </div>
                        <div class="projectIcon">
                            <img class="projectIconModification" src="img/logo-n/modification.png" data-id="<?php echo $newProject["id_projets_personnels"] ?>" alt="" title="modifier">
                        </div>
                    <?php endif; ?>
                </div>
                <section class="containerInfoProject">
                    <!-- read des informations du projet : nom, image et URL -->
                    <p id="nameProject"></p>
                    <img id="imgProject" src="img/img-project/<?php echo $newProject["img"] ?>" alt="">
                    <a href="<?php echo $newProject["url"] ?>" id="urlProject"></a>
                </section>
            </section>
            <!-- fin de la boucle -->
        <?php } ?>

    </section>

</main>